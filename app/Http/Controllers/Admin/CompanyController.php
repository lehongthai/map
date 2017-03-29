<?php
/**
 * Created by PhpStorm.
 * product: PC
 * Date: 3/26/2017
 * Time: 8:37 AM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function getList(){
    	$listCompany = Company::all();
        $title = 'Danh sách công ty';
        return view('admin.company.list', compact('listCompany', 'title'));
    }

    public function getCreate(){
    	$title = 'Thêm mới công ty';
        return view('admin.company.create', compact('title'));
    }

    public function postCreate(Request $request){
       	$this->validate($request, [
            'name' => 'required|unique:company,name',
            'lng' => 'required|unique:company,lng',
            'lat' => 'required|unique:company,lat'
        ]);

        $company = new Company();
        $company->name = $request->name;
        $company->website = $request->website;
        $company->phone = $request->phone;
        $company->address = $request->address;
        $company->lng = $request->lng;
        $company->lat = $request->lat;

        if ($company->save()){
            $message = ['level' => 'success', 'flash_message' => 'Tạo thành công công ty'];
        }else{
            $message = ['level' => 'danger', 'flash_message' => 'Tạo không thành công công ty'];
        }
        return redirect('quan-ly-cong-ty/danh-sach')->with($message);
    }

    public function getUpdate($id=null){
       if ($id != NULL){
            $infoCompany = Company::find($id);
            $title = 'Cập nhật công ty';
            return view('admin.company.update', compact('infoCompany', 'title'));
        }else{
            $message = ['level' => 'danger', 'flash_message' => 'Không tìm thấy công ty'];
        }
        return redirect('quan-ly-cong-ty/danh-sach')->with($message);
    }

    public function postUpdate(Request $request){
       	$this->validate($request, [
            'name' => 'required'
        ]);

        $id = $request->id;
        $company = Company::find($id);
        if ($company){
            $company->name = $request->name;
	        $company->website = $request->website;
	        $company->phone = $request->phone;
	        $company->address = $request->address;
	        $company->lng = $request->lng;
	        $company->lat = $request->lat;
            if ($company->save()){
                $message = ['level' => 'success', 'flash_message' => 'Cập nhật thành công công ty'];
            }else{
                $message = ['level' => 'danger', 'flash_message' => 'Cập nhật thành công công ty'];
            }
        }else{
            $message = ['level' => 'danger', 'flash_message' => 'Không tìm thấy công ty'];
        }
        return redirect('quan-ly-cong-ty/danh-sach')->with($message);
    }

    public function getDelete($id=0)
    {
        $message = ['level' => 'danger', 'flash_message' => 'Không tìm thấy công ty'];
        $company = Company::find($id);
        if (isset($company) && $company && $company != null) {
            if ($company->delete()) {
                $message = ['level' => 'success', 'flash_message' => 'Xóa thành công công ty'];
            }
        }
        return redirect('quan-ly-cong-ty/danh-sach')->with($message);
    }
}