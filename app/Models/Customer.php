<?php
namespace App\Models;

use App\User;
use DB;
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 3/26/2017
 * Time: 7:48 AM
 */
class Customer extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'customers';
    protected $fillable = ['fullname', 'email', 'phone', 'address', 'product_code', 'note', 'status'];

    public function productCustomer(){
        return $this->belongTo('App\Models\Product');
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
}