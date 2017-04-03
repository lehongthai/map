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
    protected $fillable = ['name', 'phone', 'address', 'user_id', 'note', 'status', 'code'];

    public function productCustomer(){
        return $this->belongTo('App\Models\Product');
    }

    public static function getListOrder(){
        $sql = 'SELECT u.name, u.email, u.phone, u.address, o.code, o.status, o.note, o.created_at, o.id 
                    FROM orders as o 
                    LEFT JOIN users as u 
                      ON o.user_id = u.id ';
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