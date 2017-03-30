<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 3/29/2017
 * Time: 2:57 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Delivery;
use Illuminate\Http\Request;

class AdvancedController extends Controller
{
    public function getStreet(Request $request){
        $title = 'Xem Đường Đi Nhân Viên';
        $listUser = Delivery::getListUser();
        $listProduct = Delivery::getListProduct();
        return view('admin.advanced.street', compact('title', 'listUser', 'listProduct', 'listCustomer'));
    }

    public function postStreet(Request $request){
        $this->validate($request,[
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'date' => 'required|date'
        ]);
        $title = "Không tìm thấy dữ liệu";
        $uid = $request->user_id;
        $pid = $request->product_id;
        $date = $request->date;
        $listDistance = Delivery::getDistance($uid,$pid,$date);
        if ($listDistance){
            $title = "Vị trí nhân viên";
        }
        return view('admin.advanced.view_street', compact('listDistance', 'title'));
    }
}