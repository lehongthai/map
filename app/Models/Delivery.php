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
    protected $fillable = ['user_id', 'product_id', 'note', 'status','address_delivery','phone_receiver','name_receiver'];

    public function userDelivery()
    {
        return $this->belongTo('App\User');
    }

    public function productDelivery(){
        return $this->belongTo('App\Models\Product');
    }

    public function customerDelivery(){
        return $this->belongTo('App\Models\Customer');
    }

    public static function getListDelivery(){
        $sql = 'SELECT d.status, d.name_receiver, d.address_delivery, d.phone_receiver, d.note, d.id, d.created_at, u.name as uName, p.name as pName, c.fullname as cName 
                    FROM deliverys as d 
                    LEFT JOIN users as u 
                      ON d.user_id =u.id 
                    LEFT JOIN products as p 
                      ON d.product_id = p.id 
                    LEFT JOIN customers as c 
                      ON d.customer_id = c.id ';

        return DB::select($sql);
    }

    public static function getListUser(){
        return User::select('id', 'name')->get();
    }

    public static function getListProduct(){
        return Product::select('id', 'name')->get();
    }

    public static function getListCustomer(){
        return Customer::select('id', 'fullname')->get();
    }

    public static function getDistance($uid, $pid, $date){
            $sql = 'SELECT routes FROM deliverys as d 
                      LEFT JOIN users as u 
                        ON u.id = d.user_id 
                      LEFT JOIN products as p 
                        ON d.product_id = p.id 
                      WHERE d.user_id = ' . $uid . ' 
                      AND d.product_id = ' . $pid . ' 
                      AND d.date = "' . $date . '"';
        $arrRoutes = [];
        $listRoutes = DB::select($sql);
        if (count($listRoutes) > 0){
            foreach ($listRoutes as $v){
                array_push($arrRoutes, $v->routes);
            }
        }
        return $arrRoutes;
    }

    public function updateRoutes($did, $lng, $lat){
        $data = "{lat: $lat, lng: $lng},";
        $oldData = $this->getRouteById($did);
        if ($oldData || $oldData == NULL){
            $dataUpdate = $oldData . $data;
            return Delivery::where('id', $did)->update(['routes' => $dataUpdate]);
        }
        return false;
    }

    private function getRouteById($id){
        $route = Delivery::find($id);
        if ($route){
            return $route->routes;
        }
        return false;
    }
}