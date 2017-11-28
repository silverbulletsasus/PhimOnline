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
					<div class="panel-heading">Thêm mới user</div>
					<div class="panel-body">
						<form action="{{route('postAddUser')}}" method="POST">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div>
								<label>Username</label>
								<input type="text" class="form-control" name="txtUserName">
							</div>
							<br>
							<div>
								<label>Password</label>
								<input type="password" class="form-control" name="txtPassword">
							</div>
							<br>
							<div>
								<label> Nhập Lại Password</label>
								<input type="password" class="form-control" name="txtRePassword">
							</div>
							<br>
							<div>
								<label>Email</label>
								<input type="email" class="form-control" name="txtEmail">
							</div>
							<br>
							<div>
								<label>Họ và Tên</label>
								<input type="text" class="form-control" name="txtName">
							</div>
							<br>
							<div>
								<label>CMND</label>
								<input type="text" class="form-control" name="txtCMND">
							</div>
							<br>
							<div>
								<label>Địa chỉ</label>
								<input type="text" class="form-control" name="txtDiaChi">
							</div>
							<br>
							<div>
								<label>Số Điện Thoại</label>
								<input type="text" class="form-control" name="txtSDT">
							</div>
							<br>
							<div>
								<label>Ngày Sinh</label>
								<input type="text" class="form-control" name="txtNgaySinh">
							</div>
							<br>
							<div>
								<label>Giới Tính</label><br>
								<label class="radio-inline"><input type="radio" name="txtGioiTinh"  value="0">Nam</label>
								<label class="radio-inline"><input type="radio" name="txtGioiTinh"  value="1">Nữ</label>
							</div>
							<br>
							<button type="submit" class="btn btn-primary" name="btnSubmit">Thêm Mới</button>
							<button type="button" class="btn btn-primary" onclick="window.location='admin/user/list'">Bỏ Qua</button>
						</form>
					</div>
				</div>
			</div>
		</div>
@endsection