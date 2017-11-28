@extends('admin.layout.master')
@section('content-change')
		<div class="row">
		    <div class="col-md-12">
		        <h1 class="page-header">Phòng Chiếu</h1>
		    </div>
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
					<div class="panel-heading">Thêm mới phòng chiếu</div>
					<div class="panel-body">
						<form action="{{route('postAddPhongChieu')}}" method="POST">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div>
								<label for="txtTen">Tên Phòng Chiếu</label>
								<input type="text" class="form-control" name="txtTen">
							</div>
							<br>
							<div>
								<label>Số Chỗ</label>
								<input type="text" class="form-control" name="txtSoCho">
							</div>
							<br>
							<div>
								<label>Diện Tích</label>
								<input type="text" class="form-control" name="txtDienTich">
							</div>
							<br>
							<div>
								<label>Tình Trạng</label>
								<textarea class="form-control" name="txtTinhTrang" id="editor"></textarea>
							</div>
							<br>
							<button type="submit" class="btn btn-primary" name="btnSubmit">Thêm Mới</button>
							<button type="button" class="btn btn-primary" onclick="window.location='admin/phongchieu/ListPhongChieu'">Bỏ Qua</button>
						</form>
					</div>
				</div>
			</div>
		</div>
@endsection