<?php
/**
 * Created by PhpStorm.
 * product: PC
 * Date: 3/26/2017
 * Time: 8:37 AM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getList(){
        $title = 'Danh sách sản phẩm';
        $listProduct = Product::all();
        return view('admin.product.list', compact('listProduct', 'title'));
    }

    public function getCreate(){
        $title = 'Thêm mới sản phẩm';
        return view('admin.product.create', compact('title'));
    }

    public function postCreate(Request $request){
        $this->validate($request, 
            [
            'name' => 'required',
            'code' => 'required|unique:products,code'
            ],
            [
            'name.required' => 'Bạn chưa nhập tên',
            'code.required' => 'Bạn chưa nhập mã sản phẩm',
            'code.unique'   => 'Mã sản phẩm đã bị trùng'
            ]);

        $product = new Product();
        $product->name = $request->name;
        $product->code = $request->code;
        $product->quanlity = $request->quanlity;

        if ($product->save()){
            $message = ['level' => 'success', 'flash_message' => 'Tạo thành công sản phẩm'];
        }else{
            $message = ['level' => 'danger', 'flash_message' => 'Tạo không thành công sản phẩm'];
        }
        return redirect('quan-ly-san-pham/danh-sach')->with($message);
    }

    public function getUpdate($id=null){
        if ($id != NULL){
            $infoProduct = product::find($id);
            $title = 'Cập nhật nhân viên';
            return view('admin.product.update', compact('infoProduct', 'title'));
        }else{
            $message = ['level' => 'danger', 'flash_message' => 'Không tìm thấy sản phẩm'];
        }
        return redirect('quan-ly-san-pham/danh-sach')->with($message);
    }

    public function postUpdate(Request $request){
        $this->validate($request, 
            [
            'name' => 'required',
            'code' => 'required'
            ],
            [
            'name.required' => 'Bạn chưa nhập tên',
            'code.required' => 'Bạn chưa nhập mã sản phẩm'
            ]);

        $id = $request->id;
        $product = product::find($id);
        if ($product){
            $product->name = $request->name;
            $product->code = $request->code;
            $product->quanlity = $request->quanlity;
            if ($product->save()){
                $message = ['level' => 'success', 'flash_message' => 'Cập nhật thành công sản phẩm'];
            }else{
                $message = ['level' => 'danger', 'flash_message' => 'Cập nhật thành công sản phẩm'];
            }
        }else{
            $message = ['level' => 'danger', 'flash_message' => 'Không tìm thấy sản phẩm'];
        }
        return redirect('quan-ly-san-pham/danh-sach')->with($message);
    }

    public function getDelete($id=0)
    {
        $message = ['level' => 'danger', 'flash_message' => 'Không tìm thấy sản phẩm'];
        $product = product::find($id);
        if (isset($product) && $product && $product != null) {
            if ($product->delete()) {
                $message = ['level' => 'success', 'flash_message' => 'Xóa thành công sản phẩm'];
            }
        }
        return redirect('quan-ly-san-pham/danh-sach')->with($message);
    }
}