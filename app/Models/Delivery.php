<?php
namespace App\Models;

use App\User;
use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: PC
 * Date: 3/26/2017
 * Time: 8:20 AM
 */
class Delivery extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'deliverys';
    protected $fillable = ['user_id', 'customer_id', 'product_id', 'note', 'status', 'address_delivery', 'phone_receiver'];

    public function userDelivery()
    {
        return $this->belongTo('App\User');
    }

    public function productDelivery()
    {
        return $this->belongTo('App\Models\Product');
    }

    public function customerDelivery()
    {
        return $this->belongTo('App\Models\Customer');
    }

    public static function getListDelivery()
    {
        $sql = 'SELECT d.status, u.phone, d.note, d.id, d.created_at, u.name, o.name as oName, o.phone as oPhone, o.address 
                    FROM deliverys as d 
                    LEFT JOIN users as u 
                      ON d.user_id =u.id 
                    LEFT JOIN orders as o 
                      ON d.order_code = o.code ';

        return DB::select($sql);
    }

    public static function getListUser()
    {
        return User::select('id', 'name')->where('level', 2)->get();
    }

    public static function getListProduct()
    {
        return Product::select('id', 'name')->get();
    }

    public static function getListOrderViewStreet(){
        $sql = 'SELECT name, code 
                    FROM orders as o 
                    LEFT JOIN deliverys as d 
                      ON o.code = d.order_code 
                    WHERE d.status = 2 ';
        return DB::select($sql);
    }

    public static function getListOrderViewLocal(){
        $sql = 'SELECT name, code 
                    FROM orders as o 
                    LEFT JOIN deliverys as d 
                      ON o.code = d.order_code 
                    WHERE d.status = 1 ';
        return DB::select($sql);
    }

    public static function getListOrder($code=null)
    {
        if ($code == null){
            return Order::select('code', 'name')->where('status', 0)->get();
        }
        return DB::select("SELECT code,name FROM orders WHERE status <> 1 OR code = '" . $code . "'");
    }

    public static function getDistance($uid, $pid, $date)
    {
        $sql = 'SELECT routes FROM deliverys as d 
                      LEFT JOIN users as u 
                        ON u.id = d.user_id 
                      LEFT JOIN orders as o 
                        ON d.order_code = o.code 
                      WHERE d.user_id = ' . $uid . ' 
                      AND d.order_code = "' . $pid . '"  
                      AND d.date = "' . $date . '"';
        $arrRoutes = [];
        $listRoutes = DB::select($sql);
        if (count($listRoutes) > 0) {
            foreach ($listRoutes as $v) {
                array_push($arrRoutes, $v->routes);
            }
        }
        return $arrRoutes;
    }

    public function updateRoutes($did, $lng, $lat)
    {
        $data = "{lat: $lat, lng: $lng},";
        $oldData = $this->getRouteById($did);
        if ($oldData || $oldData == NULL) {
            $dataUpdate = $oldData . $data;
            return Delivery::where('id', $did)->update(['routes' => $dataUpdate]);
        }
        return false;
    }

    private function getRouteById($id)
    {
        $route = Delivery::find($id);
        if ($route) {
            return $route->routes;
        }
        return false;
    }

    public static function getOrder($uid)
    {
        $sql = 'SELECT d.id as delivery_id, d.order_code as order_id, o.address, o.phone, d.status, d.time_get, d.time_over, d.note
                    FROM deliverys as d 
                    LEFT JOIN users as u 
                        ON d.user_id = u.id 
                    LEFT JOIN orders as o 
                        ON d.order_code = o.code
                    WHERE d.user_id = ' . $uid . ' ';

        return DB::select($sql);
    }

    public static function getupdateOrder($user, $id)
    {
        $sql = 'SELECT d.id, o.address, o.phone, d.status, d.time_get, d.time_over, d.note
                    FROM deliverys as d 
                    LEFT JOIN users as u 
                        ON d.user_id = u.id 
                    LEFT JOIN orders as o 
                        ON d.order_code = o.code
                      WHERE d.user_id = ' . $user . ' AND d.id = ' . $id . '  AND d.order_code = o.code';

        return DB::select($sql);
    }


    public function updateStatus($id, $status)
    {
        return Delivery::where('id', $id)->update(['status' => $status]);
    }

    public static function getLastOrder($uid){
        $sql = 'SELECT d.id as delivery_id, d.status, d.order_code, o.address, o.phone, d.time_get, d.time_over, d.note  
                  FROM deliverys as d 
                  LEFT JOIN orders as o 
                    ON d.order_code = o.code 
                  WHERE d.user_id = ' . $uid . ' 
                  ORDER BY d.id DESC LIMIT 1';
        return DB::select($sql);
    }

    public function updateStatusOrder($delivery_id, $user, $order_code, $status)
    {
        return Delivery::where('id', $delivery_id)
            ->where('user_id', $user)
            ->where('order_code',$order_code)
            ->update(['status' => $status]);
    }
}