<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Đăng Nhập</title>
	<base href="{{asset('')}}" >
	<link rel="stylesheet" href="file-admin/css/bootstrap.min.css">
	<link rel="stylesheet" href="file-admin/css/style.css">

</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
			@if(count($errors)>0)
				<div class="alert alert-danger">
					@foreach($errors->all() as $err)				
						{{$err}} <br>
					@endforeach
				</div>
			@endif
			@if(Session::has('message'))
				<div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
			@endif
				<div class="login-panel panel panel-default">
					<div class="panel-heading">Đăng Nhập</div>
					<div class="panel-body">
						<form action="admin/dangnhap" method="post">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div>
								<label>Username: </label>
								<input type="text" class="form-control" name="txtuser">
							</div>
							<br>
							<div>
								<label>Password: </label>
								<input type="password" class="form-control" name="txtpass">
							</div>
							<br>
							<button
							 type="submit" class="btn btn-primary">Đăng Nhập</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="file-admin/js/jquery.min.js"></script>
	<script src="file-admin/js/bootstrap.min.js"></script>
</body>
</html>
