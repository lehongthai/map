<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 3/22/2017
 * Time: 8:11 AM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
    	$title = 'Trang Quản Trị';
        $orderByStatus0 = $this->getOrderByStatus(0);
        $orderByStatus1 = $this->getOrderByStatus(1);
        $orderByStatus2 = $this->getOrderByStatus(2);
        $userOnline = $this->getUserOnline();
        return view('admin.dashboard.index', compact('title', 'orderByStatus0', 'orderByStatus1', 'orderByStatus2', 'userOnline'));
    }
    private function getOrderByStatus($status=0){
        $sql = 'SELECT count(*) as total FROM deliverys WHERE status = ' . $status;
        return DB::select($sql)[0]->total;
    }

    private function getUserOnline(){
        $sql = 'SELECT count(*) as total FROM users WHERE level <> 3 AND DATE_ADD(NOW(),INTERVAL -5 MINUTE) > updated_at';
        DB::select($sql)[0]->total;
    }
}