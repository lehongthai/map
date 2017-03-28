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


class UserController extends Controller
{
    public function getList(){
        $listUser = User::all();
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
            'email' => 'required|email|unique:users'
        ]);

        $user = new User();
        $user->name = $request->fullname;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->birthday = convertStringDate2String($request->birthday, 'd/m/Y', 'Y-m-d');
        $user->mobile_token = md5(time());
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
            'fullname' => 'required'
        ]);

        $id = $request->id;
        $user = User::find($id);
        if ($user){
            $user->name = $request->fullname;
            $user->address = $request->address;
            $user->birthday = convertStringDate2String($request->birthday, 'd/m/Y', 'Y-m-d');
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
}