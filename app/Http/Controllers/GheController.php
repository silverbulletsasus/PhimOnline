<?php

namespace App\Http\Controllers;
use App\Ghe;
use App\PhongChieu;
use Illuminate\Http\Request;

class GheController extends Controller
{
	public function ListGhe()
	{
		$ghe = Ghe::all();
		return view('admin.ghe.list', ['ghe'=>$ghe]);
	}
	public function GetAddGhe()
	{
		$phongchieu = PhongChieu::all();
		return view('admin.ghe.add', ['phongchieu'=>$phongchieu]);
	}
	public function PostAddGhe(Request $request)
	{
		$this->validate($request, 
			[
				"txtTen" => "required",
				"txtTinhTrang" => "required",
				"txtPhongChieu" => "required"
			], 
			[
				"txtTen.required" => "Vui lòng nhập tên ghế",
				"txtTinhTrang.required" => "Vui lòng nhập tình trạng ghế",
				"txtPhongChieu.required" => "Vui lòng chọn phòng chiếu"
			]
		);
		$ghe = new Ghe();
		$ghe->ghe_ten = $request->txtTen;
		$ghe->ghe_tinhtrang = $request->txtTinhTrang;
		$ghe->pc_id = $request->txtPhongChieu;
		$ghe->save();
		return redirect('admin/ghe/ListGhe')->with(['flag'=>'success', 'message'=>'Thêm ghế thành công']);
	}
	public function getEditGhe($ghe_id)
	{
		$phongchieu = PhongChieu::all();
		$ghe = Ghe::find($ghe_id);
		return view('admin.ghe.edit', ['ghe'=>$ghe, 'phongchieu'=>$phongchieu]);
	}
	public function PostEditGhe(Request $request, $ghe_id)
	{
		$this->validate($request, 
			[
				"txtTen" => "required",
				"txtTinhTrang" => "required",
				"txtPhongChieu" => "required"
			], 
			[
				"txtTen.required" => "Vui lòng nhập tên ghế",
				"txtTinhTrang.required" => "Vui lòng nhập tình trạng ghế",
				"txtPhongChieu.required" => "Vui lòng chọn phòng chiếu"
			]
		);
		$ghe = Ghe::find($ghe_id);
		$ghe->ghe_ten = $request->txtTen;
		$ghe->ghe_tinhtrang = $request->txtTinhTrang;
		$ghe->pc_id = $request->txtPhongChieu;
		$ghe->save();
		return redirect('admin/ghe/EditGhe/'.$ghe_id)->with(['flag'=>'success', 'message'=>'Sửa ghế thành công']);
	}
	public function DeleteGhe($ghe_id)
	{
		$ghe = Ghe::find($ghe_id);
		$ghe->delete();
		return redirect()->back()->with(['flag'=>'success', 'message'=>'Xóa ghế thành công']);
	}
}
