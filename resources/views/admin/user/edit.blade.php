@extends('admin.layout.master')
@section('content-change')
		<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">User</h1>
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
					<div class="panel-heading">Sửa user</div>
					<div class="panel-body">
						<form action="admin/user/edit/{{$user->nv_id}}" method="POST">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div>
								<label>Username</label>
								<input type="text" class="form-control" name="txtUserName" value="{{$user->nv_username}}" readonly="">
							</div>
							<br>
							<div>
								<label>Password</label>
								<input type="password" class="form-control" name="txtPassword" disabled>
							</div>
							<br>
							<div>
								<label>Chức vụ</label>
								<select name="txtChucVu" class="form-control">
									<option value="">Chọn Chức Vụ Nhân Viên</option>
									@foreach($chucvu->all() as $row)
										<option 
											@if($row->cv_id == $user->cv_id)
												{{"selected"}}
											@endif
										value="{{$row->cv_id}}">{{$row->cv_ten}}</option>
									@endforeach
								</select>
							</div>
							<br>
							<div>
								<label>Email</label>
								<input type="email" class="form-control" name="txtEmail" value="{{$user->nv_email}}">
							</div>
							<br>
							<div>
								<label>Họ và Tên</label>
								<input type="text" class="form-control" name="txtName" value="{{$user->nv_ten}}">
							</div>
							<br>
							<div>
								<label>CMND</label>
								<input type="text" class="form-control" name="txtCMND" value="{{$user->nv_cmnd}}">
							</div>
							<br>
							<div>
								<label>Địa chỉ</label>
								<input type="text" class="form-control" name="txtDiaChi" value="{{$user->nv_diachi}}">
							</div>
							<br>
							<div>
								<label>Số Điện Thoại</label>
								<input type="text" class="form-control" name="txtSDT" value="{{$user->nv_sdt}}">
							</div>
							<br>
							<div>
								<label>Ngày Sinh</label>
								<input type="text" class="form-control" name="txtNgaySinh" value="{{$user->nv_ngaysinh}}">
							</div>
							<br>
							<div>
								<label>Giới Tính</label><br>
								<label class="radio-inline"><input 
									@if($user->nv_gioitinh == 0)
										{{"checked"}}
									@endif
								type="radio" name="txtGioiTinh"  value="0">Nam</label>
								<label class="radio-inline"><input 
									@if($user->nv_gioitinh == 1)
										{{"checked"}}
									@endif
								type="radio" name="txtGioiTinh"  value="1">Nữ</label>
							</div>
							<br>
							<button type="submit" class="btn btn-primary" name="btnSubmit">Sửa</button>
							<button type="button" class="btn btn-primary" onclick="window.location='admin/user/list'">Bỏ Qua</button>
						</form>
					</div>
				</div>
			</div>
		</div>
@endsection