<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 3/26/2017
 * Time: 9:05 AM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function getList(){
        $title = 'Danh sách giao hàng';
        $listDelivery = Delivery::getListDelivery();
        return view('admin.delivery.list', compact('listDelivery', 'title'));
    }

    public function getCreate(){
        $title = 'Thêm mới đơn hàng';
        $listUser = Delivery::getListUser();
        $listCustomer = Delivery::getListCustomer();
        return view('admin.delivery.create', compact('title', 'listUser', 'listCustomer'));
    }

    public function postCreate(Request $request){
        $this->validate($request, [
            'user_id' => 'required|exists:users,id',
            'customer_id' => 'required|exists:customers,id'
        ]);

        $delivery = new Delivery();
        $delivery->user_id = $request->user_id;
        $delivery->customer_id = $request->customer_id;
        $delivery->note = $request->note;

        if ($delivery->save()){
            $message = ['level' => 'success', 'flash_message' => 'Tạo thành công giao hàng'];
        }else{
            $message = ['level' => 'danger', 'flash_message' => 'Tạo không thành công giao hàng'];
        }
        return redirect('quan-ly-giao-hang/danh-sach')->with($message);
    }

    public function getUpdate($id=null){
        if ($id != NULL){
            $listUser = Delivery::getListUser();
            $listCustomer = Delivery::getListCustomer();
            $infoDelivery = Delivery::find($id);
            $title = 'Cập nhật đơn hàng';
            return view('admin.delivery.update', compact('infoDelivery', 'title', 'listUser', 'listCustomer'));
        }else{
            $message = ['level' => 'danger', 'flash_message' => 'Không tìm thấy giao hàng'];
        }
        return redirect('quan-ly-giao-hang/danh-sach')->with($message);
    }

    public function postUpdate(Request $request){
        $this->validate($request, [
            'user_id' => 'required|exists:users,id',
            'customer_id' => 'required|exists:customers,id'
        ]);

        $id = $request->id;
        $delivery = Delivery::find($id);
        if ($delivery){
            $delivery->user_id = $request->user_id;
            $delivery->customer_id = $request->customer_id;
            $delivery->note = $request->note;
            if ($request->status != NULL && $request->status == 2){
                $delivery->status = 2;
            }else{
                $delivery->status = 1;
            }
            if ($delivery->save()){
                $message = ['level' => 'success', 'flash_message' => 'Cập nhật thành công giao hàng'];
            }else{
                $message = ['level' => 'danger', 'flash_message' => 'Cập nhật thành công giao hàng'];
            }
        }else{
            $message = ['level' => 'danger', 'flash_message' => 'Không tìm thấy giao hàng'];
        }
        return redirect('quan-ly-giao-hang/danh-sach')->with($message);
    }

    public function getDelete($id=0)
    {
        $message = ['level' => 'danger', 'flash_message' => 'Không tìm thấy giao hàng'];
        $delivery = Delivery::find($id);
        if (isset($delivery) && $delivery && $delivery != null) {
            if ($delivery->delete()) {
                $message = ['level' => 'success', 'flash_message' => 'Xóa thành công giao hàng'];
            }
        }
        return redirect('quan-ly-giao-hang/danh-sach')->with($message);
    }
}