@extends('layout.master')
@section('content-change')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-push-2">
			@if(count($errors)>0) <!-- errors ??? -->
				<div class="alert alert-danger">
					@foreach($errors->all() as $err)
					{{$err}}<br>
					@endforeach
				</div>
			@endif
			@if(Session::has('thanhcong'))
				<div class="alert alert-{{Session::get('flag')}}">{{Session::get('thanhcong')}}</div>
			@endif
			<div class="panel panel-default">
				<div class="panel-heading">Đăng Ký Tài Khoản</div>
				<div class="panel-body">
					<form action="{{route('dangky')}}" method="POST">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div>
							<label>UserName: </label>
							<input type="text" class="form-control" name="txtuser">
						</div>
						<br>
						<div>
							<label>Password: </label>
							<input type="password" class="form-control" name="txtpass">
						</div>
						<br>
						<div>
							<label>Nhập lại Password: </label>
							<input type="password" class="form-control" name="txtrepass">
						</div>
						<br>
						<div>
							<label>Họ Tên: </label>
							<input type="text" class="form-control" name="txtname">
						</div>
						<br>
						<div>
							<label>Email: </label>
							<input type="text" class="form-control" name="txtemail">
						</div>
						<br>
						<div>
							<label>Ngày Sinh: </label>
							<input type="text" class="form-control" name="txtngaysinh">
						</div>
						<br>
						<div>
							<label>CMND: </label>
							<input type="text" class="form-control" name="txtcmnd">
						</div>
						<br>
						<div>
							<label>Địa Chỉ: </label>
							<input type="text" class="form-control" name="txtdiachi">
						</div>
						<br>
						<div>
							<label>SDT: </label>
							<input type="text" class="form-control" name="txtsdt">
						</div>
						<br>
						<div>
							<label>Giới Tính: </label>
							<input type="text" class="form-control" name="txtgioitinh">
						</div>
						<button type="submit" class="btn btn-primary" name="submit">Đăng Ký</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection