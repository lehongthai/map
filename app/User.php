<?php

namespace App;

use App\Models\Company;
use GuzzleHttp\Client;
use GuzzleHttp\Promise\RejectionException;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{
    use Notifiable;
    private $keyApi = 'AIzaSyCoYHFhB9SbbUGXJ9jzhmSMihCJOOoQFyY';
    private $linkApi = 'https://maps.googleapis.com/maps/api/';
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
        $sql = 'SELECT u.distanceUser, u.minute, u.address, u.lat, u.lng, u.name, o.name as delivery 
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
        $dataUpdate = ['lat' => $lat, 'lng' => $lng];
        $getDistance = $this->callApiGetDistance($lat, $lng);
        if ($getDistance){
            $dataUpdate['address'] = $getDistance->destination_addresses[0];
            $dataUpdate['distanceUser'] = $getDistance->rows[0]->elements[0]->distance->text;
            $dataUpdate['minute'] = $getDistance->rows[0]->elements[0]->duration->text;
        }
        return User::where('mobile_token', $mobile_token)->update($dataUpdate);
    }

    private function callApiGoogleMap($lng, $lat)
    {
        $curl = curl_init();
        $http =  $this->linkApi . 'geocode/json?latlng=' . $lat . ',' . $lng . '&sensor=false';
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

    /**
     * @param $mobile_token
     * @param $online
     * @return mixed
     */
    public function updateStatus($mobile_token, $online)
    {
        return User::where('mobile_token', $mobile_token)->update(['status' => $online]);
    }

    /**
     * @param $uid
     * @param $pid
     * @return bool|string
     */
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

    /**
     * @param $lat string
     * @param $lng string
     * @return bool
     */
    private function callApiGetDistance($lat, $lng)
    {
        $infoCompany = Company::getLngLat();
        $client = new Client();
        $url = $this->linkApi . 'distancematrix/json?';
        $url .= 'origins=' . $infoCompany->lat . ',' . $infoCompany->lng;
        $url .= '&destinations=' . $lat . ',' . $lng;
        $url .= '&key=' . $this->keyApi;

        try {
            $response = $client->get($url);
            if ($response->getStatusCode() != 200) {
                return false;
            } else {
                $objDistance = \GuzzleHttp\json_decode($response->getBody());
                if ($objDistance->status == 'OK'){
                    return $objDistance;
                }
                return false;
            }
        } catch (RejectionException $e) {
            return false;
        }
    }
}
