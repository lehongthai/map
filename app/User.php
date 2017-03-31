<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{
    use Notifiable;

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

    public static function getListUserJson(){
        $listUser = User::select('id', 'name', 'lng', 'lat', 'address', 'phone')->get()->toJson();
        $listUser = User::all()->toJson();
        return $listUser;
    }

    public static function getInfoEmployer(){
        $sql = 'SELECT u.address, u.lat, u.lng, u.name, p.name as delivery 
                    FROM users as u 
                    LEFT JOIN deliverys as d 
                        ON u.id = d.user_id 
                    LEFT JOIN products as p 
                        ON p.id = d.product_id ';
        return json_encode(DB::select($sql));
    }

    public function updateLocal($mobile_token, $lat, $lng){
        $checkAddress = $this->callApiGoogleMap($lng, $lat);
        $dataUpdate = ['lat' => $lat, 'lng' => $lng];
        if ($checkAddress){
            $dataUpdate['address'] = $checkAddress;
        }
        return User::where('mobile_token', $mobile_token)->update($dataUpdate);
    }

    private function callApiGoogleMap($lng, $lat){
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
        if (isset($json_result) && $json_result->status == 'OK'){
            if ($json_result->results[0]->formatted_address){
                return $json_result->results[0]->formatted_address;
            }
        }
        return false;
    }

    public function updateStatus($mobile_token,$online){
        return User::where('mobile_token',$mobile_token)->update(['status' => $online]);
    }
}
