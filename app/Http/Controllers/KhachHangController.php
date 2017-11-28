<?php

namespace App\Http\Controllers;
use App\KhachHang;
use Illuminate\Http\Request;

class KhachHangController extends Controller
{
	public function ListKhachHang()
	{
		$khachhang = KhachHang::all();
		return view('admin.khachhang.list', ['khachhang'=>$khachhang]);
	}
	public function GetAddKhachHang()
	{
		return view('admin.khachhang.add');
	}
	public function PostAddKhachHang(Request $request)
	{
		$this->validate($request,
			[
				'txtUserName'=>'required|unique:khachhang,kh_username',
				'txtPassword'=>'required',
				'txtRePassword'=>'required|same:txtPassword',
				'txtName'=>'required',
				'txtEmail'=>'required|unique:khachhang,kh_email',
				'txtCMND'=>'required',
				'txtDiaChi'=>'required',
				'txtSDT'=>'required',
				'txtNgaySinh'=>'required',
				'txtGioiTinh'=>'required'
			],
			[
				'txtUserName.required'=>'Vui lòng nhập Username',
				'txtUserName.unique'=>'Username đã tồn tại',
				'txtPassword.required'=>'Vui lòng nhập mật khẩu',
				'txtRePassword.required'=>'Vui lòng nhập lại mật khẩu',
				'txtRePassword.same'=>'Mật khẩu nhập lại không đúng',
				'txtName.required'=>'Vui lòng nhập Họ Tên',
				'txtEmail.required'=>'Vui lòng nhập Email',
				'txtEmail.unique'=>'Email đã tồn tại',
				'txtCMND.required'=>'Vui lòng nhập CMND',
				'txtDiaChi.required'=>'Vui lòng nhập Địa Chỉ',
				'txtSDT.required'=>'Vui lòng nhập Số Điện Thoại',
				'txtNgaySinh.required'=>'Vui lòng nhập Ngày Sinh',
				'txtGioiTinh.required'=>'Vui lòng nhập Giới Tính'
			]);
		$user = new KhachHang();
		$user->kh_username = $request->txtUserName;
		$user->kh_password = Hash::make($request->txtPassword);// mã hóa dữ liệu trong 
		$user->kh_hoten = $request->txtName;
	    $user->kh_email = $request->txtEmail;
	    $user->kh_ngaysinh = $request->txtNgaySinh;
	    $user->kh_cmnd = $request->txtCMND;
	    $user->kh_diachi = $request->txtDiaChi;
	    $user->kh_sdt = $request->txtSDT;
	    $user->kh_gioitinh = $request->txtGioiTinh;
	    if($request->txtTinhTrang)
	    {
	    	$user->kh_tinhtrang = $request->txtTinhTrang;
	    }
		$user->save();
		return redirect('admin/khachhang/ListKhachHang')->with(['flag'=>'success', 'message'=>'Tạo tài khoản thành công']);// chuyển hướng đến trang hiện tại ??
	}
	public function GetEditKhachHang($kh_id)
	{
		$khachhang = KhachHang::find($kh_id);
		return view('admin.khachhang.edit', ['khachhang'=>$khachhang]);
	}
	public function PostEditKhachHang(Request $request, $kh_id)
	{
			$this->validate($request,
				[
					'txtName'=>'required',
					'txtCMND'=>'required',
					'txtDiaChi'=>'required',
					'txtSDT'=>'required',
					'txtNgaySinh'=>'required',
					'txtGioiTinh'=>'required'
				],
				[
					'txtName.required'=>'Vui lòng nhập Họ Tên',
					'txtCMND.required'=>'Vui lòng nhập CMND',
					'txtDiaChi.required'=>'Vui lòng nhập Địa Chỉ',
					'txtSDT.required'=>'Vui lòng nhập Số Điện Thoại',
					'txtNgaySinh.required'=>'Vui lòng nhập Ngày Sinh',
					'txtGioiTinh.required'=>'Vui lòng nhập Giới Tính'
				]);
			$user = KhachHang::find($kh_id);
			$user->kh_hoten = $request->txtName;
		    $user->kh_ngaysinh = $request->txtNgaySinh;
		    $user->kh_cmnd = $request->txtCMND;
		    $user->kh_diachi = $request->txtDiaChi;
		    $user->kh_sdt = $request->txtSDT;
		    $user->kh_gioitinh = $request->txtGioiTinh;
		    if($request->txtTinhTrang)
		    {
		    	$user->kh_tinhtrang = $request->txtTinhTrang;
		    }
			$user->save();
			return redirect('admin/khachhang/EditKhachHang/'.$kh_id)->with(['flag'=>'success', 'message'=>'Sửa tài khoản thành công']);// chuyển hướng đến trang hiện tại ??
	}
	public function DeleteKhachHang($kh_id)
	{
		$user = KhachHang::find($kh_id);
		$user->delete();
		return redirect()->back()->with(['flag'=>'success', 'message'=>'Xóa tài khoản thành công']);
	}
}
