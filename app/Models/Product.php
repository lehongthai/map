<?php
namespace App\Models;

/**
 * Created by PhpStorm.
 * User: PC
 * Date: 3/26/2017
 * Time: 7:48 AM
 */
class Product extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'code', 'keyword', 'description', 'quanlity'];
}