<?php
namespace App\Http\Controllers\Web;
use App\User;

/**
 * Created by PhpStorm.
 * User: PC
 * Date: 3/23/2017
 * Time: 4:18 PM
 */
class MapController extends \App\Http\Controllers\Controller
{
    public function display(){
        $title = 'Vị trí nhân viên';
        $total = User::all()->count();
        return view('web.map', compact('title', 'total'));
    }

    public function getListUserJson(){
        return User::getInfoEmployer();
    }
}