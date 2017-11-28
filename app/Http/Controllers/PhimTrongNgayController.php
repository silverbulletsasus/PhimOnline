<?php

namespace App\Http\Controllers;
use App\PhimTrongNgay;
use App\NgayChieu;
use App\LichChieu;
use App\PhongChieu;
use App\Phim;
use App\Rap;
use Illuminate\Http\Request;

class PhimTrongNgayController extends Controller
{
    public function ListPhimTrongNgay()
    {
    	$phimtrongngay = PhimTrongNgay::all();
    	return view('admin.phimtrongngay.list', ['phimtrongngay' => $phimtrongngay]);
    }
    public function GetAddPhimTrongNgay()
    {
    	$ngaychieu = NgayChieu::all();
    	$lichchieu = LichChieu::all();
    	$phongchieu = PhongChieu::all();
    	$phim = Phim::all();
    	$rap = Rap::all();
    	return view('admin.phimtrongngay.add', ['ngaychieu'=>$ngaychieu, 'lichchieu'=>$lichchieu, 'phongchieu'=>$phongchieu, 'phim'=>$phim, 'rap'=>$rap]);
    }
    public function PostAddPhimTrongNgay(Request $request)
    {
    	$this->validate($request, 
    		[
    			"txtNgayChieu" => "required",
    			"txtLichChieu" => "required",
    			"txtPhongChieu" => "required",
    			"txtPhim" => "required",
    			"txtRap" => "required"
    		], 
    		[
    			"txtNgayChieu.required" => "Vui lòng chọn ngày chiếu",
    			"txtLichChieu.required" => "Vui lòng chọn lịch chiếu",
    			"txtPhongChieu.required" => "Vui lòng chọn phòng chiếu",
    			"txtPhim.required" => "Vui lòng chọn phim",
    			"txtRap.required" => "Vui lòng chọn rạp",
    		]
    	);
    	$phimtrongngay = new PhimTrongNgay();
    	$phimtrongngay->nc_id = $request->txtNgayChieu;
    	$phimtrongngay->lc_id = $request->txtLichChieu;
    	$phimtrongngay->pc_id = $request->txtPhongChieu;
    	$phimtrongngay->phim_id = $request->txtPhim;
    	$phimtrongngay->rap_id = $request->txtRap;
    	$phimtrongngay->save();
    	return redirect('admin/phimtrongngay/ListPhimTrongNgay')->with(['flag'=>'success', 'message' => 'Thêm phim trong ngày thành công']);
    }
    public function GetEditPhimTrongNgay($ptn_id)
    {
        $ngaychieu = NgayChieu::all();
        $lichchieu = LichChieu::all();
        $phongchieu = PhongChieu::all();
        $phimchieu = Phim::all();
        $rap = Rap::all();
        $phim = PhimTrongNgay::find($ptn_id);
        return view('admin.phimtrongngay.edit', ['ngaychieu'=>$ngaychieu, 'lichchieu'=>$lichchieu, 'phongchieu'=>$phongchieu, 'phimchieu'=>$phimchieu, 'rap'=>$rap, 'phim' => $phim]);
    }
    public function PostEditPhimTrongNgay(Request $request, $ptn_id)
    {
        $this->validate($request, 
            [
                "txtNgayChieu" => "required",
                "txtLichChieu" => "required",
                "txtPhongChieu" => "required",
                "txtPhim" => "required",
                "txtRap" => "required"
            ], 
            [
                "txtNgayChieu.required" => "Vui lòng chọn ngày chiếu",
                "txtLichChieu.required" => "Vui lòng chọn lịch chiếu",
                "txtPhongChieu.required" => "Vui lòng chọn phòng chiếu",
                "txtPhim.required" => "Vui lòng chọn phim",
                "txtRap.required" => "Vui lòng chọn rạp",
            ]
        );
        $phimtrongngay = PhimTrongNgay::find($ptn_id);
        $phimtrongngay->nc_id = $request->txtNgayChieu;
        $phimtrongngay->lc_id = $request->txtLichChieu;
        $phimtrongngay->pc_id = $request->txtPhongChieu;
        $phimtrongngay->phim_id = $request->txtPhim;
        $phimtrongngay->rap_id = $request->txtRap;
        $phimtrongngay->save();
        return redirect('admin/phimtrongngay/EditPhimTrongNgay/'.$ptn_id)->with(['flag'=>'success', 'message' => 'Sửa phim trong ngày thành công']);
    }
    public function DeletePhimTrongNgay($ptn_id)
    {
        $phimtrongngay = PhimTrongNgay::find($ptn_id);
        $phimtrongngay->delete();
        return redirect()->back()->with(['flag'=>'success', 'message'=>'Xóa phim trong ngày thành công']);
    }
}
