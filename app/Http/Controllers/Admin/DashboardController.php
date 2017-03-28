<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 3/22/2017
 * Time: 8:11 AM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        return view('admin.dashboard.index');
    }
}