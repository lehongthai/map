<?php

namespace App;

use App\Models\Company;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{
    use Notifiable;
    private $keyApi = 'AIzaSyCoYHFhB9SbbUGXJ9jzhmSMihCJOOoQFyY';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'lng', 'lat', 'image', 'birthday', 'address', 'mobile_token', 'active', 'banded'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function getListUserJson()
    {
        $listUser = User::where('level', '<>', 3)->toJson();
        return $listUser;
    }

    public static function getInfoEmployer()
    {
        $sql = 'SELECT u.address, u.lat, u.lng, u.name, o.name as delivery 
                    FROM users as u 
                    LEFT JOIN deliverys as d 
                        ON u.id = d.user_id 
                    LEFT JOIN orders as o 
                        ON d.order_code = o.code 
                    WHERE u.level <> 3';
        return json_encode(DB::select($sql));
    }

    public function updateLocal($mobile_token, $lat, $lng)
    {
        $checkAddress = $this->callApiGoogleMap($lng, $lat);
        $dataUpdate = ['lat' => $lat, 'lng' => $lng];
        $getDistance = $this->callApiGetDistance($lat, $lng);
        if ($checkAddress) {
            $dataUpdate['address'] = $checkAddress;
        }
        if ($getDistance) {
            $dataUpdate['distance'] = $getDistance;
        }
        return User::where('mobile_token', $mobile_token)->update($dataUpdate);
    }

    private function callApiGoogleMap($lng, $lat)
    {
        $curl = curl_init();
        $http = 'http://maps.googleapis.com/maps/api/geocode/json?latlng=' . $lat . ',' . $lng . '&sensor=false';
        curl_setopt_array(
            $curl, array(
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => $http,
                CURLOPT_USERAGENT => 'API GET LOCAL GOOGLE MAP',
            )
        );
        $resp = curl_exec($curl);
        curl_close($curl);
        $json_result = json_decode($resp);
        if (isset($json_result) && $json_result->status == 'OK') {
            if ($json_result->results[0]->formatted_address) {
                return $json_result->results[0]->formatted_address;
            }
        }
        return false;
    }

    /*updat status user
    */
    public function updateStatus($mobile_token, $online)
    {
        return User::where('mobile_token', $mobile_token)->update(['status' => $online]);
    }

    public static function getAdvancedEmployer($uid, $pid)
    {
        $sql = 'SELECT u.address, u.lat, u.lng, u.name, o.name as delivery 
                    FROM users as u 
                    LEFT JOIN deliverys as d 
                        ON u.id = d.user_id 
                    LEFT JOIN orders as o 
                        ON o.code = d.order_code 
                    WHERE u.id = ' . $uid . ' 
                     AND o.code = "' . $pid . '" 
                      AND d.status = 1 ';
        $result = DB::select($sql);
        if ($result) {
            return json_encode($result);
        }
        return false;
    }

    private function callApiGetDistance($lat, $lng)
    {
        $infoCompany = Company::getLngLat();
        $curl = curl_init();
        $url = 'https://maps.googleapis.com/maps/api/distancematrix/json?origins=';
        $url .= $lat . ',' . $lng . '&destinations=' . $infoCompany->lat . ',' . $infoCompany->lng . '&key=' . $this->keyApi;
        /*curl_setopt_array(
            $curl, array(
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => $url,
                CURLOPT_USERAGENT => 'API GET DISTANCE GOOGLE MAP',
            )
        );*/
        curl_setopt($curl, CURLOPT_URL, $url);
        if(!curl_exec($curl)){
            die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
        }
        $resp = curl_exec($curl);
        curl_close($curl);

        $json_result = json_decode($resp);
        pre($json_result);
        if (isset($json_result) && $json_result->status == 'OK') {
            if ($json_result->rows->elements->status == 'OK') {
                return $json_result->rows->elements->distance->text;
            }
        }
        return false;
    }
}
