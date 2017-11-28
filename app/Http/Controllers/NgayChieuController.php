<?php

namespace App\Http\Controllers;
use App\NgayChieu;
use Illuminate\Http\Request;

class NgayChieuController extends Controller
{
    public function GetListNgayChieu()
    {
    	$ngaychieu = NgayChieu::all();
    	return view('admin.ngaychieu.list', ['ngaychieu'=>$ngaychieu]);
    }
    public function GetAddNgayChieu()
    {
    	return view('admin.ngaychieu.add');
    }
    public function PostAddNgayChieu(Request $request)
    {
    	$this->validate($request, 
    		[
    			"txtNgay" => "required|unique:ngaychieu,nc_ngay"
    		], 
    		[
                "txtNgay.required" => "Vui Lòng Chọn Ngày Chiếu",
                "txtNgay.unique" => "Ngày đã tồn tại"
            ]
    	);
        $ngay = new NgayChieu();
        $ngay->nc_ngay = $request->txtNgay;
        $ngay->save();
        return redirect('admin/ngaychieu/ListNgayChieu')->with(['flag' => 'success', 'message'=>'Thêm ngày chiếu thành công']);
    }
    public function GetEditNgayChieu($nc_id)
    {
        $ngay = NgayChieu::find($nc_id);
        return view('admin.ngaychieu.edit', ['ngaychieu'=>$ngay]);
    }
    public function PostEditNgayChieu(Request $request, $nc_id)
    {
        $this->validate($request, 
            [
                "txtNgay" => "required"
            ], 
            [
                "txtNgay.required" => "Vui Lòng Chọn Ngày Chiếu"
            ]
        );
        $ngay = NgayChieu::find($nc_id);
        $ngay->nc_ngay = $request->txtNgay;
        $ngay->save();
        return redirect()->back()->with(['flag' => 'success', 'message' => 'Sửa thành công']);
    }
    public function DeleteNgayChieu($nc_id)
    {
        $ngaychieu = NgayChieu::find($nc_id);
        $ngaychieu->delete();
        return redirect()->back()->with(['flag' => 'success', 'message' => 'Xóa thành công']);
    }
}
