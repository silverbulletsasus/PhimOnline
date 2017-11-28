<?php

namespace App\Http\Controllers;
use App\PhongChieu;
use Illuminate\Http\Request;

class PhongChieuController extends Controller
{
    public function GetListPhongChieu()
    {
    	$phongchieu = PhongChieu::all();
    	return view('admin.phongchieu.list', ['phongchieu'=>$phongchieu]);
    }
    public function GetAddPhongChieu()
    {
    	return view('admin.phongchieu.add');
    }
    public function PostAddPhongChieu(Request $request)
    {
    	$this->validate($request, 
    		[
    			'txtTen' => 'required|unique:phongchieu,pc_ten',
    			'txtSoCho' => 'required',
    			'txtDienTich' => 'required',
    			'txtTinhTrang' => 'required'
    		], 
    		[
    			'txtTen.required' => 'Vui lòng nhập tên phòng chiếu',
    			'txtTen.unique' => 'Tên phòng chiếu trùng',
    			'txtSoCho.required' => 'Vui lòng nhập số chổ phòng chiếu',
    			'txtDienTich.required' => 'Vui lòng nhập diện tích phòng chiếu',
    			'txtTinhTrang.required' => 'Vui lòng nhập tình trạng phòng chiếu'
    		]
    	);
    	$phongchieu = new PhongChieu();
    	$phongchieu->pc_ten = $request->txtTen;
    	$phongchieu->pc_socho = $request->txtSoCho;
    	$phongchieu->pc_dientich = $request->txtDienTich;
    	$phongchieu->pc_tinhtrang = $request->txtTinhTrang;
    	$phongchieu->save();
    	return redirect('admin/phongchieu/ListPhongChieu')->with(['flag'=>'success', 'message'=>'Thêm phòng chiếu thành công']);
    }
    public function GetEditPhongChieu($pc_id)
    {
    	$phongchieu = PhongChieu::find($pc_id);
    	return view('admin.phongchieu.edit', ['phongchieu'=>$phongchieu]);
    }
    public function PostEditPhongChieu(Request $request, $pc_id)
    {
    	$this->validate($request, 
    		[
    			'txtTen' => 'required',
    			'txtSoCho' => 'required',
    			'txtDienTich' => 'required',
    			'txtTinhTrang' => 'required'
    		], 
    		[
    			'txtTen.required' => 'Vui lòng nhập tên phòng chiếu',
    			'txtSoCho.required' => 'Vui lòng nhập số chổ phòng chiếu',
    			'txtDienTich.required' => 'Vui lòng nhập diện tích phòng chiếu',
    			'txtTinhTrang.required' => 'Vui lòng nhập tình trạng phòng chiếu'
    		]
    	);
    	$phongchieu = PhongChieu::find($pc_id);
    	$phongchieu->pc_ten = $request->txtTen;
    	$phongchieu->pc_socho = $request->txtSoCho;
    	$phongchieu->pc_dientich = $request->txtDienTich;
    	$phongchieu->pc_tinhtrang = $request->txtTinhTrang;
    	$phongchieu->save();
    	return redirect('admin/phongchieu/EditPhongChieu/'.$pc_id)->with(['flag'=>'success', 'message'=>'Sửa phòng chiếu thành công']);
    }
    public function DeletePhongChieu($pc_id)
    {
    	$phongchieu = PhongChieu::find($pc_id);
    	$phongchieu->delete();
    	return redirect()->back()->with(['flag'=>'success', 'message'=>'Xóa phòng chiếu thành công']);
    }
}
