@extends('admin.layout.master')
@section('content-change')
		<div class="row">
		    <div class="col-md-12">
		        <h1 class="page-header">Rạp</h1>
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
					<div class="panel-heading">Sửa rạp</div>
					<div class="panel-body">
						<form action="admin/rap/EditRap/{{$rap->rap_id}}" method="POST">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div>
								<label for="txtTen">Tên Rạp</label>
								<input type="text" class="form-control" name="txtTen" value="{{$rap->rap_ten}}">
							</div>
							<br>
							<div>
								<label>Địa Chỉ</label>
								<textarea class="form-control" name="txtDiaChi" id="editor">{{$rap->rap_diachi}}</textarea>
							</div>
							<br>
							<button type="submit" class="btn btn-primary" name="btnSubmit">Sửa</button>
							<button type="button" class="btn btn-primary" onclick="window.location='admin/rap/ListRap'">Bỏ Qua</button>
						</form>
					</div>
				</div>
			</div>
		</div>
@endsection