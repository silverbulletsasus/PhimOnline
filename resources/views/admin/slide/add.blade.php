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
					<div class="panel-heading">Thêm mới slide</div>
					<div class="panel-body">
						<form action="{{route('postAddSlide')}}" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div>
								<label>Tiêu Đề</label>
								<input type="text" class="form-control" name="txtTieuDe">
							</div>
							<br>
							<div>
								<label>Hình Ảnh</label>
								<input type="file" class="form-control" name="txtHinhAnh">
							</div>
							<br>
							<div>
								<label>Chi tiết</label>
								<textarea class="form-control" name="txtChiTiet" id="editor"></textarea>
							</div>
							<br>
							<div>
								<label>Link</label>
								<input type="text" class="form-control" name="txtLink">
							</div>
							<br>
							<button type="submit" class="btn btn-primary" name="btnSubmit">Thêm Mới</button>
							<button type="button" class="btn btn-primary" onclick="window.location='admin/slide/list'">Bỏ Qua</button>
						</form>
					</div>
				</div>
			</div>
		</div>
@endsection