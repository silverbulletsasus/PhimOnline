@extends('admin.layout.master')
@section('content-change')
		<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">Hình Ảnh</h1>
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
					<div class="panel-heading">Sửa hình ảnh</div>
					<div class="panel-body">
						<form action="admin/hinhanh/EditHinhAnh/{{$hinhanh->ha_id}}" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div>
								<label>Hình Ảnh Cũ</label>
								<img src="file-admin/upload/hinhanh/{{$hinhanh->ha_ten}}">
								<br><hr>
								<label>Hình Ảnh Mới</label>
								<input type="file" class="form-control" name="txtHinhAnh">
							</div>
							<button type="submit" class="btn btn-primary" name="btnSubmit">Sửa</button>
							<button type="button" class="btn btn-primary" onclick="window.location='admin/hinhanh/ListHinhAnh/{{$hinhanh->phim_id}}'">Bỏ Qua</button>
						</form>
					</div>
				</div>
			</div>
		</div>
@endsection