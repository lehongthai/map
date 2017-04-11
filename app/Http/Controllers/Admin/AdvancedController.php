<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 3/29/2017
 * Time: 2:57 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Delivery;
use App\Models\StatusUser;
use App\User;
use Illuminate\Http\Request;

class AdvancedController extends Controller
{
    public function getStreet(){
        $title = 'Xem Đường Đi Nhân Viên';
        $listUser = Delivery::getListUser();
        $listProduct = Delivery::getListOrderViewStreet();
        $listDistance = $uid = $date = $pid = null;
        return view('admin.advanced.test_bk', compact('listDistance', 'title', 'listUser', 'listProduct', 'listCustomer', 'uid', 'date', 'pid'));
    }

    public function postStreet(Request $request){
        $this->validate($request,
            [
            'user_id'       => 'required|exists:users,id',
            'product_id'    => 'required|exists:orders,code',
            'date'          => 'required|date'
            ],
            [
            'user_id.required'      => 'Bạn chưa chọn nhân viên',
            'user_id.exists'        => 'Bạn chưa chọn nhân viên',
            'product_id.required'   => 'Bạn chưa chọn đơn hàng',
            'product_id.exists'     => 'Bạn chưa chọn đơn hàng',
            'date.required'         => 'Bạn chưa chọn ngày'
            ]);
        $title = "Không tìm thấy dữ liệu";
        $uid = $request->user_id;
        $pid = $request->product_id;
        $dateA = convertStringDate2String($request->date, 'd-m-Y', 'Y-m-d');
        $listDistance = Delivery::getDistance($uid,$pid,$dateA);
        if ($listDistance){
            $title = "Vị trí nhân viên";
            $listDistance = $listDistance[0];
        }else{
            $listDistance = NULL;
        }
        $date = $request->date;
        $listUser = Delivery::getListUser();
        $listProduct = Delivery::getListOrderViewStreet();
        return view('admin.advanced.test_bk', compact('listDistance', 'title', 'listUser', 'listProduct', 'uid', 'date', 'pid'));
    }

    public function advancedViewLocal(){
        $title = 'Xem vị trí nhân viên';
        $listUser = Delivery::getListUser();
        $listProduct = Delivery::getListOrderViewLocal();
        $infoCompany = Company::getLngLat();
        $uid = $pid = null;
        $local = NULL;
        return view('admin.advanced.employer_bk', compact('title', 'listUser', 'listProduct', 'uid', 'pid', 'local', 'infoCompany'));
    }

    public function postViewLocal(Request $request){
        $this->validate($request,
            [
            'user_id'       => 'required|exists:users,id',
            'product_id'    => 'required|exists:orders,code',
            ],
            [
            'user_id.required'      => 'Bạn chưa chọn nhân viên',
            'user_id.exists'        => 'Bạn chưa chọn nhân viên',
            'product_id.required'   => 'Bạn chưa chọn đơn hàng',
            'product_id.exists'     => 'Bạn chưa chọn đơn hàng'
            ]);
        $uid = $request->user_id;
        $pid = $request->product_id;
        $local = User::getAdvancedEmployer($uid,$pid);
        $title = "Vị trí nhân viên";
        if (empty($local)){
            $local = NULL;
            $title = "Không tìm thấy dữ liệu";
        }
        $listUser = Delivery::getListUser();
        $listProduct = Delivery::getListOrderViewLocal();
        $infoCompany = Company::getLngLat();
        return view('admin.advanced.employer_bk', compact('local', 'title', 'listUser', 'listProduct', 'uid', 'pid', 'infoCompany'));
    }

    public function viewOnOffEmployer(){
        $title = 'Trạng thái nhân viên';
        $listUser = Delivery::getListUser();
        $listStatus = $user_id = $start = $end = null;
        return view('admin.advanced.onoff', compact('listStatus', 'title', 'listUser', 'user_id', 'start', 'end'));
    }

    public function postOnOffEmployer(Request $request){
        $this->validate($request,
            [
            'user_id'   => 'required|exists:users,id',
            'start'     => 'required|date',
            'end'       => 'required|date'
            ],
            [
            'user_id.required'  => 'Bạn chưa chọn nhân viên',
            'user_id.exists'    => 'Bạn chưa chọn nhân viên',
            'start.required'    => 'Bạn chưa chọn ngày',
            'end.required'      => 'Bạn chưa chọn ngày'
            ]);
        $user_id = $request->user_id;
        $start = convertStringDate2String($request->start, 'd-m-Y', 'Y-m-d');
        $end = convertStringDate2String($request->end, 'd-m-Y', 'Y-m-d');
        $title = 'Trạng thái nhân viên';
        $listUser = Delivery::getListUser();
        $listStatus = StatusUser::getStatusUser($user_id, $start,$end);
        return view('admin.advanced.onoff', compact('listStatus', 'title', 'listUser', 'user_id', 'start', 'end'));
    }
}