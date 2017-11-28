<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;

class UserController extends Controller
{
    /*  public function getSignin()
        {
        	return view('users.dangky');
        }

        public function postSignin(Request $req)
        {
        	$this->validate($req,
        		[
        			'txtuser'=>'required|unique:khachhang,kh_username',
        			'txtpass'=>'required|min:6|max:20',
        			'txtrepass'=>'required|same:txtpass',
        			'txtname'=>'required'
        		],
        		[
        			'txtuser.required'=>'Vui lòng nhập Username',
        			'txtuser.unique'=>'Username đã tồn tại',
        			'txtpass.required'=>'Vui lòng nhập mật khẩu',
        			'txtpass.min'=>'Mật khẩu tối thiểu 6 kí tự',
        			'txtpass.max'=>'Mật khẩu tối đa 20 kí tự',
        			'txtrepass.same'=>'Mật khẩu nhập lại không đúng',
        			'txtrepass.required'=>'Vui lòng nhập lại mật khẩu',
        			'txtname.required'=>'Vui lòng nhập Họ Tên'
        		]);
        	$user = new KhachHang();
        	$user->kh_username = $req->txtuser;
        	$user->kh_password = md5($req->txtpass);// mã hóa dữ liệu trong 
        	$user->kh_hoten = $req->txtname;
            $user->kh_email = $req->txtemail;
            $user->kh_ngaysinh = $req->txtngaysinh;
            $user->kh_cmnd = $req->txtcmnd;
            $user->kh_diachi = $req->txtdiachi;
            $user->kh_sdt = $req->txtsdt;
            $user->kh_gioitinh = $req->txtgioitinh;
        	$user->save();
        	return redirect()->back()->with('thanhcong', 'Tạo tài khoản thành công');// chuyển hướng đến trang hiện tại ??
        }*/

        public function getLogin()
        {
            return view('admin.user.dangnhap');
        }

        public function postLogin(Request $req)
        {
            $this->validate($req,
                    [
                        'txtuser'=>'required',
                        'txtpass'=>'required'
                    ],
                    [
                        'txtuser.required'=>'Vui lòng nhập username',
                        'txtpass.required'=>'Vui lòng nhập password'
                    ]
                );
            $credentials = array('nv_username'=>$req->txtuser, 'password'=>$req->txtpass);
            if(Auth::attempt($credentials, true))
            {
                //Auth::login(Auth::user(), true);
                return redirect('admin');
            }   
            else
            {
                return redirect('admin/dangnhap')->with(['flag'=>'danger', 'message'=>'UserName hoặc PassWord không chính xác! Vui lòng nhập lại']);
                //dd($check);
            }
        }
        public function logout()
        {
            Auth::logout();
            return redirect('admin/dangnhap');
        }
        public function GetListUser()
        {
            $user = User::all();
            return view("admin.user.list", ['user'=>$user]);
        }
        public function GetAddUser()
        {
            return view("admin.user.add");
        }
        public function PostAddUser(Request $request)
        {
            $this->validate($request, 
                [
                    "txtUserName" => "required|unique:users,nv_username",
                    "txtPassword" => "required|min:6|max:20",
                    "txtRePassword" => "required|same:txtPassword",
                    "txtEmail" => "required",
                    "txtName" => "required",
                    "txtCMND" => "required",
                    "txtDiaChi" => "required",
                    "txtSDT" => "required",
                    "txtNgaySinh" => "required",
                    "txtGioiTinh" => "required",
                ],
                [
                    "txtUserName.required" => "Vui lòng nhập UserName",
                    "txtUserName.unique" => "UserName Đã Tồn Tại",
                    "txtPassword.required" => "Vui lòng nhập Password",
                    "txtPassword.min" => "Mật khẩu tối thiểu 6 kí tự",
                    "txtPassword.max" => "Mật khẩu tối đa 20 kí tự",
                    "txtRePassword.required" => "Vui lòng nhập mật khẩu lại",
                    "txtRePassword.same" => "Mật khẩu nhập lại không đúng",
                    "txtEmail.required" => "Vui lòng nhập Email",
                    "txtName.required" => "Vui lòng nhập Họ và Tên",
                    "txtCMND.required" => "Vui lòng nhập chứng minh nhân dân",
                    "txtDiaChi.required" => "Vui lòng nhập địa chỉ",
                    "txtSDT.required" => "Vui lòng nhập số điện thoại",
                    "txtNgaySinh.required" => "Vui lòng nhập ngày sinh",
                    "txtGioiTinh.required" => "Vui lòng nhập giới tính",
                ]
            );
            $user = new User();
            $user->nv_username = $request->txtUserName;
            $user->password = Hash::make($request->txtPassword);
            $user->nv_email = $request->txtEmail;
            $user->nv_ten = $request->txtName;
            $user->nv_cmnd = $request->txtCMND;
            $user->nv_diachi = $request->txtDiaChi;
            $user->nv_sdt = $request->txtSDT;
            $user->nv_ngaysinh = $request->txtNgaySinh;
            $user->nv_gioitinh = $request->txtGioiTinh;
            $user->save();
            return redirect()->back()->with(['flag'=>'success', 'message'=>'Thêm User Thành Công']);
        }
        public function GetEditUser($nv_id)
        {
            $user = User::find($nv_id);
            $chucvu = ChucVu::all();
            return view("admin.user.edit", ['user'=> $user, 'chucvu'=>$chucvu]);
        }
        public function PostEditUser(Request $request, $nv_id)
        {
            $this->validate($request, 
                [
                    "txtChucVu" => "required",
                    "txtEmail" => "required",
                    "txtName" => "required",
                    "txtCMND" => "required",
                    "txtDiaChi" => "required",
                    "txtSDT" => "required",
                    "txtNgaySinh" => "required",
                    "txtGioiTinh" => "required",
                ],
                [
                    "txtChucVu.required" => "Vui lòng chọn Chức Vụ",
                    "txtEmail.required" => "Vui lòng nhập Email",
                    "txtName.required" => "Vui lòng nhập Họ và Tên",
                    "txtCMND.required" => "Vui lòng nhập chứng minh nhân dân",
                    "txtDiaChi.required" => "Vui lòng nhập địa chỉ",
                    "txtSDT.required" => "Vui lòng nhập số điện thoại",
                    "txtNgaySinh.required" => "Vui lòng nhập ngày sinh",
                    "txtGioiTinh.required" => "Vui lòng nhập giới tính",
                ]
            );
            $user = User::find($nv_id);
            $user->nv_username = $request->txtUserName;
            $user->cv_id = $request->txtChucVu;
            $user->nv_email = $request->txtEmail;
            $user->nv_ten = $request->txtName;
            $user->nv_cmnd = $request->txtCMND;
            $user->nv_diachi = $request->txtDiaChi;
            $user->nv_sdt = $request->txtSDT;
            $user->nv_ngaysinh = $request->txtNgaySinh;
            $user->nv_gioitinh = $request->txtGioiTinh;
            $user->save();
            return redirect("admin/user/edit/".$nv_id)->with(['flag'=>'success', 'message'=>'Chỉnh Sửa User Thành Công']);
        }
        public function Delete($nv_id)
        {
            $user = User::find($nv_id);
            $user->delete();
            return redirect()->back()->with(['flag'=>'success', 'message'=>'Xóa user thành công']);
        }
}
