@extends('admin.layout.master')
@section('content-change')
		<div class="row">
		    <div class="col-md-12">
		        <h1 class="page-header">Chức Vụ</h1>
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
					<div class="panel-heading">Thêm mới chức vụ</div>
					<div class="panel-body">
						<form action="{{route('postAddChucVu')}}" method="POST">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div>
								<label for="txtTen">Tên Chức Vụ</label>
								<input type="text" class="form-control" name="txtTen">
							</div>
							<br>
							<div>
								<label>Mô Tả Chức Vụ</label>
								<textarea class="form-control" name="txtMoTa" id="editor"></textarea>
							</div>
							<br>
							<button type="submit" class="btn btn-primary" name="btnSubmit">Thêm Mới</button>
							<button type="button" class="btn btn-primary" onclick="window.location='admin/chucvu/list'">Bỏ Qua</button>
						</form>
					</div>
				</div>
			</div>
		</div>
@endsection