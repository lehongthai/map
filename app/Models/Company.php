<?php
namespace App\Models;

/**
 * Created by PhpStorm.
 * User: PC
 * Date: 3/26/2017
 * Time: 7:48 AM
 */
class Company extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'company';
    protected $fillable = ['name', 'website', 'phone', 'address', 'lng', 'lat'];
}