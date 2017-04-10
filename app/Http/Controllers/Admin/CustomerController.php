<?php
/**
 * Created by PhpStorm.
 * product: PC
 * Date: 3/26/2017
 * Time: 8:37 AM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function getList(){
        $listCustomer = Customer::all();
        $title = 'Danh sách khách hàng';
        return view('admin.customer.list', compact('listCustomer', 'title'));
    }

    public function getCreate(){
        $title = 'Thêm mới khách hàng';
        $listProduct = Customer::getListProduct();
        return view('admin.customer.create', compact('title','listProduct'));
    }

    public function postCreate(Request $request){
       	$this->validate($request,
			[
				'fullname'  => 'required|min:3',
				'email'     => 'required|email|unique:customers,email',
			],
			[
				'fullname.required' => 'Bạn chưa nhập tên người dùng',
				'fullname.min'      => 'Tên người dùng phải ít nhất có 3 kí tự',
				'email.required'    => 'Bạn chưa nhập email',
				'email.email'       => 'Bạn chưa nhập đúng định dạnh email',
				'email.unique'      => 'Email đã tồn tại',
			]);

        $customer = new Customer();
        $customer->fullname = $request->fullname;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->product_code = $request->product_code;
        $customer->note = $request->note;
  		

        if ($customer->save()){
            $message = ['level' => 'success', 'flash_message' => 'Tạo thành công khách hàng'];
        }else{
            $message = ['level' => 'danger', 'flash_message' => 'Tạo không thành công khách hàng'];
        }
        return redirect('quan-ly-khach-hang/danh-sach')->with($message);
    }

    public function getUpdate($id=null){
        if ($id != NULL){
            $listProduct = Customer::getListProduct();
            $infoCustomer = Customer::find($id);
            $title = 'Cập nhật khách hàng';
            return view('admin.customer.update', compact('infoCustomer', 'title', 'listProduct'));
        }else{
            $message = ['level' => 'danger', 'flash_message' => 'Không tìm thấy khách hàng'];
        }
        return redirect('quan-ly-khach-hang/danh-sach')->with($message);
    }

    public function postUpdate(Request $request){
       	$this->validate($request,
			[
                'product_code'  => 'required|exists:products,code',
				'fullname'      => 'required|min:3',
			],
			[
				'fullname.required' => 'Bạn chưa nhập tên người dùng',
				'fullname.min'      => 'Tên người dùng phải ít nhất có 3 kí tự',
			]);

        $id = $request->id;
        $customer = Customer::find($id);
        if ($customer){
            $customer->fullname = $request->fullname;
            $customer->email = $request->email;
	        $customer->phone = $request->phone;
	        $customer->address = $request->address;
	        $customer->note = $request->note;
            $customer->product_code = $request->product_code;

            if ($customer->save()){
                $message = ['level' => 'success', 'flash_message' => 'Cập nhật thành công khách hàng'];
            }else{
                $message = ['level' => 'danger', 'flash_message' => 'Cập nhật không thành công khách hàng'];
            }
        }else{
            $message = ['level' => 'danger', 'flash_message' => 'Không tìm thấy khách hàng'];
        }
        return redirect('quan-ly-khach-hang/danh-sach')->with($message);
    }

    public function getDelete($id=0)
    {
        $message = ['level' => 'danger', 'flash_message' => 'Không tìm thấy khách hàng'];
        $customer = Customer::find($id);
        if (isset($customer) && $customer && $customer != null) {
            if ($customer->delete()) {
                $message = ['level' => 'success', 'flash_message' => 'Xóa thành công khách hàng'];
            }
        }
        return redirect('quan-ly-khach-hang/danh-sach')->with($message);
    }
}