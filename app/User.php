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
}
