<?php
namespace App\Models;

use App\User;
use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: PC
 * Date: 3/26/2017
 * Time: 7:48 AM
 */
class Order extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'orders';
    protected $fillable = ['name', 'phone', 'address', 'user_id', 'note', 'status', 'code', 'receiver_phone', 'receiver_address', 'receiver_name'];

    public function productCustomer(){
        return $this->belongTo('App\Models\Product');
    }

    public static function getListOrder(){
        $sql = 'SELECT u.name as namecustomer, u.email, u.phone, u.address, o.code, o.status, o.note, o.created_at, o.id, o.name, d.time_get, d.time_over, d.image, o.user_id, o.receiver_name, o.receiver_phone, o.receiver_address
                    FROM orders as o 
                    LEFT JOIN users as u 
                        ON o.user_id = u.id 
                    LEFT JOIN deliverys as d
                        ON o.code = d.order_code';

        return DB ::select($sql);
    }

    public static function getDetail($id){
        $sql = 'SELECT u.name as namecustomer, u.email, u.phone, u.address, o.code, o.status, o.note, o.created_at, o.id, o.name, d.time_get, d.time_over, d.image, o.user_id, o.receiver_name, o.receiver_phone, o.receiver_address
                    FROM orders as o 
                    LEFT JOIN users as u 
                        ON o.user_id = u.id 
                    LEFT JOIN deliverys as d
                        ON o.code = d.order_code Where '.$id.' = o.id';

        return DB ::select($sql);
    }


    public static function getListDelivery(){
        $sql = 'SELECT c.fullname, c.email, c.phone, c.address, c.product_code, c.status, c.note, c.created_at, p.code as pName
                    FROM customers as c 
                    LEFT JOIN products as p 
                      ON c.product_code = p.code ';

        return DB::select($sql);
    }

    public static function getListProduct(){
        return Product::select('id', 'code', 'name')->get();
    }

    public static function updateStatus($code){
        Order::where('code', $code)->update(['status' => 1]);
        return true;
    }
}