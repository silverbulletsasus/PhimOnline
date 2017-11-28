<?php

namespace App\Http\Controllers;
use App\LichChieu;
use Illuminate\Http\Request;

class LichChieuController extends Controller
{
    public function GetListLichChieu()
    {
    	$lichchieu = LichChieu::all();
    	return view('admin.lichchieu.list', ['lichchieu' => $lichchieu]);
    }
    public function GetAddLichChieu()
    {
    	return view('admin.lichchieu.add');
    }
    public function PostAddLichChieu(Request $request)
    {
    	$this->validate($request, 
    		[
    			"txtGio" => "required",
    			"txtPhut" => "required",
    			"txtGiay" => "required"
    		], 
    		[
    			"txtGio.required" => "Vui lòng chọn giờ",
    			"txtPhut.required" => "Vui lòng chọn phút",
    			"txtGiay.required" => "Vui lòng chọn giây"
    		]
    	);
    	$array = array($request->txtGio, $request->txtPhut, $request->txtGiay);
    	$gio = implode(":", $array);
    	$lichchieu = new LichChieu();
    	$lichchieu->lc_giochieu = $gio;
    	$lichchieu->save();
    	return redirect('admin/lichchieu/ListLichChieu')->with(['flag'=>'success', 'message' => 'Thêm lịch chiếu thành công']);
    }
    public function GetEditLichChieu($lc_id)
    {
    	$lichchieu = LichChieu::find($lc_id);
    	$array = explode(':', $lichchieu->lc_giochieu);
    	return view('admin.lichchieu.edit', ['array' => $array , 'id' => $lichchieu->lc_id]);
    }
    public function PostEditLichChieu(Request $request, $lc_id)
    {
    	$this->validate($request, 
    		[
    			"txtGio" => "required",
    			"txtPhut" => "required",
    			"txtGiay" => "required"
    		], 
    		[
    			"txtGio.required" => "Vui lòng chọn giờ",
    			"txtPhut.required" => "Vui lòng chọn phút",
    			"txtGiay.required" => "Vui lòng chọn giây"
    		]
    	);
    	$array = array($request->txtGio, $request->txtPhut, $request->txtGiay);
    	$gio = implode(":", $array);
    	$lichchieu = LichChieu::find($lc_id);
    	$lichchieu->lc_giochieu = $gio;
    	$lichchieu->save();
    	return redirect('admin/lichchieu/EditLichChieu/'.$lc_id)->with(['flag'=>'success', 'message' => 'Sửa lịch chiếu thành công']);
    }
    public function DeleteLichChieu($lc_id)
    {
    	$lichchieu = LichChieu::find($lc_id);
    	$lichchieu->delete();
    	return redirect()->back()->with(['flag' => 'success', 'message' => 'Xóa lịch chiếu thành công']);
    }
}
