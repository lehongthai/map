<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 3/21/2017
 * Time: 4:55 PM
 */

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function __construct()
    {
        if (Auth::check() && Auth::user()->level != 1){
            return redirect()->back();
        }
    }

    public function getList(){
        $listUser = User::where('level', '<>', 3)->get();
        $title = 'Danh sách thành viên';
        return view('admin.user.list', compact('listUser', 'title'));
    }

    public function getCreate(){
        $title = 'Thêm mới thành viên';
        return view('admin.user.create', compact('title'));
    }

    public function postCreate(Request $request){
        $this->validate($request, [
            'fullname' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => "required|min:9|max:12|alpha_num",
        ]);

        $user = new User();
        $user->name = $request->fullname;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->birthday = $request->birthday;
        $user->mobile_token = csrf_token() . md5(time());
        $user->level = 2;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->active = md5(uniqid());

        if ($user->save()){
            $message = ['level' => 'success', 'flash_message' => 'Tạo thành công thành viên'];
        }else{
            $message = ['level' => 'danger', 'flash_message' => 'Tạo không thành công thành viên'];
        }
        return redirect('quan-ly-nhan-vien/danh-sach')->with($message);
    }

    public function getUpdate($id=null){
        if ($id != NULL){
            $infoUser = User::find($id);
            $title = 'Cập nhật nhân viên';
            return view('admin.user.update', compact('infoUser', 'title'));
        }else{
            $message = ['level' => 'danger', 'flash_message' => 'Không tìm thấy thành viên'];
        }
        return redirect('quan-ly-nhan-vien/danh-sach')->with($message);
    }

    public function postUpdate(Request $request){
        $this->validate($request, [
            'fullname' => 'required',
            'phone' => "required|min:9|max:12|alpha_num",
        ]);

        $id = $request->id;
        $user = User::find($id);
        if ($user){
            $user->name = $request->fullname;
            $user->address = $request->address;
            $user->birthday = $request->birthday;
            $user->phone = $request->phone;
            if ($user->save()){
                $message = ['level' => 'success', 'flash_message' => 'Cập nhật thành công thành viên'];
            }else{
                $message = ['level' => 'danger', 'flash_message' => 'Cập nhật không thành công thành viên'];
            }
        }else{
            $message = ['level' => 'danger', 'flash_message' => 'Không tìm thấy thành viên'];
        }
        return redirect('quan-ly-nhan-vien/danh-sach')->with($message);
    }

    public function getDelete($id=0)
    {
        $message = ['level' => 'danger', 'flash_message' => 'Không tìm thấy thành viên'];
        $user = User::find($id);
        if (isset($user) && $user && $user != null) {
            if ($user->delete()) {
                $message = ['level' => 'success', 'flash_message' => 'Xóa thành công thành viên'];
            }
        }
        return redirect('quan-ly-nhan-vien/danh-sach')->with($message);
    }

    public function getOrder()
    {
        $title = 'Đơn hàng';
        $infoOrder = Order::where('user_id',Auth::user()->id)->get();
        
        return view('admin.customer.order', compact('infoOrder', 'title'));
    }

    public function getListcustomer()
    {
        $title = 'Danh sách khách hàng';
        $listCustomer = User::where('level',3)->get();
        return view('admin.customer.list', compact('title','listCustomer'));
    }

    public function getInfo()
    {
        $title = 'Thông tin';
        return view('admin.customer.info', compact('title'));
    }
}