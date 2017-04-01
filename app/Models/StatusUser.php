<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 4/1/2017
 * Time: 8:22 AM
 */

namespace App\Models;


use Illuminate\Support\Facades\DB;

class StatusUser extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'user_status';
    protected $fillable = ['user_id', 'status', 'created_at', 'date'];

    public static function getStatusUser($user_id, $start, $end){
        $sql = 'SELECT u.name, s.status, s.date 
                  FROM user_status as s 
                  LEFT JOIN users as u 
                    ON u.id = s.user_id 
                  WHERE s.date BETWEEN "' . $start . '" AND "' . $end . '" 
                  AND u.id = ' . $user_id;
        return DB::select($sql);
    }
}