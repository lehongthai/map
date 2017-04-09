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
use Hash;
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
        $this->validate($request, 
            [
            'fullname' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => "required|min:9|max:12|alpha_num",
            ],
            [
            'fullname.required' => 'Bạn chưa nhập tên',
            'phone.required' => 'Bạn chưa nhập số điện thoại',
            'phone.min' => 'Số điện thoại phải từ 9 tới 12 số',
            'phone.max' => 'Số điện thoại phải từ 9 tới 12 số',
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Bạn chưa nhập đúng định dạng email'
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
        $this->validate($request, 
            [
            'fullname' => 'required',
            'phone' => "required|min:9|max:12|alpha_num",
            'email' => 'required|email'
            ],
            [
            'fullname.required' => 'Bạn chưa nhập tên',
            'phone.required' => 'Bạn chưa nhập số điện thoại',
            'phone.min' => 'Số điện thoại phải từ 9 tới 12 số',
            'phone.max' => 'Số điện thoại phải từ 9 tới 12 số',
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Bạn chưa nhập đúng định dạng email'
            ]);

        $id = $request->id;
        $user = User::find($id);
        if ($user)
        {
            $user->name = $request->fullname;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->birthday = $request->birthday;
            $user->phone = $request->phone;
            if ($user->save())
            {
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

    public function getChangePassword()
    {
        $title = 'Đổi mật khẩu';
        return view('admin.user.changepassword', compact('title'));
    }

    public function postChangePassword(Request $request)
    {
        $this->validate($request,
            [
                'password' => 'required',
                'newpassword' => 'required|min:3|max:32',
                'repassword' => 'required|same:newpassword'
            ],
            [
                'password.required' => 'Bạn chưa nhập mật khẩu cũ',
                'newpassword.required' => 'Bạn chưa nhập mật khẩu',
                'newpassword.min' => 'Mật khẩu phải có ít nhất 3 kí tự',
                'newpassword.max' => 'Mật khẩu chỉ được tối đa 32 kí tự',
                'repassword.required' => 'Bạn chưa nhập lại mật khẩu',
                'repassword.same' => 'Mật khẩu nhập lại chưa đúng'
            ]);
        
        $user = User::find(Auth::user()->id);
        if (Hash::check($request->password, $user->password))
        {
            $user->password = bcrypt($request->newpassword);
            if ($user->save()){
                $message = ['level' => 'success', 'flash_message' => 'Đổi mật khẩu thành công'];
            }else{
                $message = ['level' => 'danger', 'flash_message' => 'Đổi mật khẩu không thành công'];
            }
            return redirect('trang-quan-tri/dashboard')->with($message);
        }
        else 
        {
            $message = ['level' => 'danger', 'flash_message' => 'Mật khẩu cũ không đúng'];
            return redirect('trang-quan-tri/doi-mat-khau')->with($message);
        }
    }

    public function getChangeImage()
    {
        $title = 'Đổi ảnh đại diện';
        return view('admin.user.changeimage', compact('title'));
    }

    public function postChangeImage(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if($request->hasFile('Hinh'))
        {
            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('trang-quan-tri/doi-anh/'.$id)->with('loi','Bạn chỉ được chọn file jpg, png hoặc jpeg thôi');
            }
            $name = $file->getClientOriginalName();
            $Hinh = str_random(4)."_".$name;
            while(file_exists("public/upload/profile/".$Hinh))
            {
                $Hinh = str_random(4)."_".$name;
            }
            $file->move("public/upload/profile",$Hinh);
            //unlink("public/upload/profile/".$user->image);
            $user->image = $Hinh;
        }
        if ($user->save())
        {
            $message = ['level' => 'success', 'flash_message' => 'Đổi ảnh thành công'];
            return redirect('trang-quan-tri/dashboard')->with($message);
        }else
        {
            $message = ['level' => 'danger', 'flash_message' => 'Đổi ảnh không thành công'];
            return redirect('trang-quan-tri/doi-anh')->with($message);
        }
    }
}