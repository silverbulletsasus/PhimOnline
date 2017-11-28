@extends('admin.layout.master')
@section('content-change')
		<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">Slide</h1>
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
					<div class="panel-heading">Sửa slide</div>
					<div class="panel-body">
						<form action="admin/slide/edit/{{$slide->slide_id}}" method="POST" enctype="multipart/form-data"> <!-- input hidden $slide->slide_id  -->
						<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div>
								<label>Tiêu Đề</label>
								<input type="text" class="form-control" name="txtTieuDe" value="{{$slide->slide_tieude}}">
							</div>
							<br>
							<div>
								<label>Hình Ảnh</label> <br>
								<img src="file-admin/upload/slide/{{$slide->slide_tenhinhanh}}" width="200"><br><br>
								<input type="file" class="form-control" name="txtHinhAnh">
							</div>
							<br>
							<div>
								<label>Chi tiết</label>
								<textarea class="form-control" name="txtChiTiet" id="editor">{{$slide->slide_chitiet}}</textarea>
							</div>
							<br>
							<div>
								<label>Link</label>
								<input type="text" class="form-control" name="txtLink" value="{{$slide->slide_link}}">
							</div>
							<br>
							<button type="submit" class="btn btn-primary" name="btnSubmit">Sửa</button>
							<button type="button" class="btn btn-primary" onclick="window.location='admin/slide/list'">Bỏ Qua</button>
					</div>
				</div>
			</div>
		</div>
@endsection