<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 4/2/2017
 * Time: 9:20 AM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Delivery;

class OrderController extends Controller
{
    const PASSWORD_DEFAULT = '123456';

    public function getList()
    {
        $listOrder = Order::getListOrder();
        $title = 'Danh sách đơn hàng';
        return view('admin.order.list', compact('listOrder', 'title'));
    }

    public function getCreate()
    {
        $title = 'Thêm mới khách hàng';
        $listUser = Delivery::getListUser();
        $listProduct = Product::all();
        return view('admin.order.create', compact('title', 'listProduct', 'listUser'));
    }

    public function postCreate(Request $request)
    {
        $this->validate($request,
            [
                'user_id' => 'required|exists:users,id',
                'name' => 'required|min:3',
                'email' => 'required|email',
                'phone' => 'required|min:9|max:12|alpha_num',
                'address' => 'required',
            ],
            [
                'name.required' => 'Bạn chưa nhập tên người dùng',
                'name.min' => 'Tên người dùng phải ít nhất có 3 kí tự',
                'email.required' => 'Bạn chưa nhập email',
                'email.email' => 'Bạn chưa nhập đúng định dạnh email',
                'email.unique' => 'Email đã tồn tại',
            ]);

        $user = $this->findOrCreateUser($request);
        if ($user) {
            $order = new Order();
            $order->product = implode(',', $request->product);
            $order->note = $request->note;
            $order->user_id = $user->id;
            $order->name = $request->name;
            $order->code = strtoupper(substr(md5(uniqid()), 0, 10)) . $user->id;
            $order->phone = $request->phone;
            $order->address = $request->address;
            $order->employee_id = $request->user_id;
            if ($order->save()) {
                $this->sendMail($user);
                $delivery = new Delivery();
                $delivery->user_id = $request->user_id;
                $delivery->order_code = $order->code;
                $delivery->note = $request->note;
                $delivery->save();
                $message = ['level' => 'success', 'flash_message' => 'Tạo thành công đơn hàng'];
            } else {
                $message = ['level' => 'danger', 'flash_message' => 'Tạo không thành công đơn hàng'];
            }
        } else {
            $message = ['level' => 'danger', 'flash_message' => 'Tạo không thành công khách hàng'];
        }

        return redirect('quan-ly-don-hang/danh-sach')->with($message);
    }

    public function getUpdate($id = null)
    {
        if ($id != NULL) {
            $listProduct = Product::all();
            $infoOrder = Order::find($id);
            $listUser = Delivery::getListUser();
            if ($infoOrder) {
                $infoUser = User::find($infoOrder->user_id);
                $title = 'Cập nhật đơn hàng';
                return view('admin.order.update', compact('infoOrder', 'title', 'listProduct', 'infoUser', 'listUser'));
            }
        } else {
            $message = ['level' => 'danger', 'flash_message' => 'Không tìm thấy đơn hàng'];
        }
        return redirect('quan-ly-don-hang/danh-sach')->with($message);
    }

    public function postUpdate(Request $request)
    {
        $user_id = $request->user_id_order;
        $this->validate($request,
            [
                'user_id' => 'required|exists:users,id',
                'name' => 'required|min:3',
                'email' => "required|email",
                'phone' => "required|min:9|max:12|alpha_num",
                'address' => 'required',
            ],
            [
                'name.required' => 'Bạn chưa nhập tên người dùng',
                'name.min' => 'Tên người dùng phải ít nhất có 3 kí tự',
                'email.required' => 'Bạn chưa nhập email',
                'email.email' => 'Bạn chưa nhập đúng định dạnh email',
                'email.unique' => 'Email đã tồn tại',
            ]);

        $id = $request->id;
        $order = Order::find($id);
        $user = User::find($user_id);
        if ($order && $user) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
            if ($user->save()) {
                $order->product = implode(',', $request->product);
                $order->note = $request->note;
                $order->name = $request->name;
                $order->phone = $request->phone;
                $order->address = $request->address;
                $delivery = Delivery::where('order_code', $order->code)->first();
                $delivery->user_id = $request->user_id;
                $delivery->note = $request->note;
                if ($order->save() && $delivery->save()) {
                    $message = ['level' => 'success', 'flash_message' => 'Cập nhật thành công đơn hàng'];
                } else {
                    $message = ['level' => 'danger', 'flash_message' => 'Cập nhật không thành công đơn hàng'];
                }
            } else {
                $message = ['level' => 'danger', 'flash_message' => 'Cập nhật không thành công khách hàng'];
            }
        } else {
            $message = ['level' => 'danger', 'flash_message' => 'Không tìm thấy đơn hàng'];
        }
        return redirect('quan-ly-don-hang/danh-sach')->with($message);
    }

    public function getDelete($id = 0)
    {
        $message = ['level' => 'danger', 'flash_message' => 'Không tìm thấy khách hàng'];
        $order = Order::find($id);
        if (isset($order) && $order && $order != null) {
            if ($order->delete()) {
                $message = ['level' => 'success', 'flash_message' => 'Xóa thành công khách hàng'];
            }
        }
        return redirect('quan-ly-don-hang/danh-sach')->with($message);
    }

    public function sendMail($user)
    {
        Mail::send('emails.send_info_order', ['user' => $user], function ($message) use ($user) {
            $message->from('teamchich26@gmail.com', 'Thông báo đơn hàng');
            $message->to($user->email, $user->name)->subject('Xác nhận đơn hàng');
        });
    }

    private function findOrCreateUser($data){
        $userInfo = User::where('email', $data->email)->first();
        if ($userInfo){
            return $userInfo;
        }
        $user = new User();
        $user->name = $data->name;
        $user->email = $data->email;
        $user->password = bcrypt(self::PASSWORD_DEFAULT);
        $user->phone = $data->phone;
        $user->address = $data->address;
        if ($user->save()) return $user;
        return false;
    }
}