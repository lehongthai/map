<?php
namespace App\Models;

use App\User;
use DB;
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 3/26/2017
 * Time: 8:20 AM
 */
class Delivery extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'deliverys';
    protected $fillable = ['user_id', 'product_id', 'note', 'status'];

    public function userDelivery()
    {
        return $this->belongTo('App\User');
    }

    public function productDelivery(){
        return $this->belongTo('App\Models\Product');
    }

    public static function getListDelivery(){
        $sql = 'SELECT d.status, d.note, d.id, d.created_at, u.name as uName, p.name as pName 
                    FROM deliverys as d 
                    LEFT JOIN users as u 
                      ON d.user_id =u.id 
                    LEFT JOIN products as p 
                      ON d.product_id = p.id ';
        return DB::select($sql);
    }

    public static function getListUser(){
        return User::select('id', 'name')->get();
    }

    public static function getListProduct(){
        return Product::select('id', 'name')->get();
    }
}