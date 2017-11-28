@extends('admin.layout.master')
@section('content-change')
		<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">Khách Hàng</h1>
		    </div>
		    <!-- /.col-lg-12 -->
		</div>
		<div class="row">
			<div class="col-md-12">
			@if(count($errors)>0)
				<div class="alert alert-danger">
					@foreach($errors->all() as $error)
						{{$error}} <br>
					@endforeach
				</div>
			@endif
			@if(Session::has('message'))
				<div class="alert alert-{{Session::get('flag')}}">
					{{Session::get('message')}}
				</div>
			@endif
				<div class="panel panel-default">
					<div class="panel-heading">Thêm mới khách hàng</div>
					<div class="panel-body">
						<form action="admin/khachhang/EditKhachHang/{{$khachhang->kh_id}}" method="POST">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div>
								<label>Username</label>
								<input type="text" class="form-control" name="txtUserName" value="{{$khachhang->kh_username}}" readonly="">
							</div>
							<br>
							<div>
								<label>Password</label>
								<input type="password" class="form-control" name="txtPassword" disabled="">
							</div>
							<br>
							<div>
								<label> Nhập Lại Password</label>
								<input type="password" class="form-control" name="txtRePassword" disabled="">
							</div>
							<br>
							<div>
								<label>Email</label>
								<input type="email" class="form-control" name="txtEmail" value="{{$khachhang->kh_email}}" readonly="">
							</div>
							<br>
							<div>
								<label>Họ và Tên</label>
								<input type="text" class="form-control" name="txtName" value="{{$khachhang->kh_hoten}}">
							</div>
							<br>
							<div>
								<label>CMND</label>
								<input type="text" class="form-control" name="txtCMND" value="{{$khachhang->kh_cmnd}}">
							</div>
							<br>
							<div>
								<label>Địa chỉ</label>
								<input type="text" class="form-control" name="txtDiaChi" value="{{$khachhang->kh_diachi}}">
							</div>
							<br>
							<div>
								<label>Số Điện Thoại</label>
								<input type="text" class="form-control" name="txtSDT" value="{{$khachhang->kh_sdt}}">
							</div>
							<br>
							<div>
								<label>Ngày Sinh</label>
								<input type="text" class="form-control" name="txtNgaySinh" value="{{$khachhang->kh_ngaysinh}}">
							</div>
							<br>
							<div>
								<label>Giới Tính</label><br>
								<label class="radio-inline"><input 
									@if($khachhang->kh_gioitinh == '0')
										{{"checked"}}
									@endif
								type="radio" name="txtGioiTinh"  value="0">Nam</label>
								<label class="radio-inline"><input 
									@if($khachhang->kh_gioitinh == '1')
										{{"checked"}}
									@endif
								type="radio" name="txtGioiTinh"  value="1">Nữ</label>
							</div>
							<br>
							<div>
								<label>Tình Trạng</label>
								<select class="form-control" name="txtTinhTrang">
									<option value="">Chọn Tình Trạng</option>
									<option 
										@if($khachhang->kh_tinhtrang == '1')
											{{"selected"}}
										@endif
									value="1">Kích Hoạt</option>
									<option 
										@if($khachhang->kh_tinhtrang == '0')
											{{"selected"}}
										@endif
									value="0">Chưa Kích Hoạt</option>
								</select>
							</div>
							<br>
							<button type="submit" class="btn btn-primary" name="btnSubmit">Sửa</button>
							<button type="button" class="btn btn-primary" onclick="window.location='admin/khachhang/ListKhachHang'">Bỏ Qua</button>
						</form>
					</div>
				</div>
			</div>
		</div>
@endsection