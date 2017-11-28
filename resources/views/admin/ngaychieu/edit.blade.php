@extends('admin.layout.master')
@section('content-change')
		<div class="row">
		    <div class="col-md-12">
		        <h1 class="page-header">Ngày Chiếu</h1>
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
					<div class="panel-heading">Sửa ngày chiếu</div>
					<div class="panel-body">
						<form action="admin/ngaychieu/EditNgayChieu/{{$ngaychieu->nc_id}}" method="POST">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div>
								<label>Ngày</label>
								<input type="date" class="form-control" name="txtNgay" value="{{$ngaychieu->nc_ngay}}">
							</div>	
							<br>
							<button type="submit" class="btn btn-primary" name="btnSubmit">Sửa</button>
							<button type="button" class="btn btn-primary" onclick="window.location='admin/ngaychieu/ListNgayChieu'">Bỏ Qua</button>
						</form>
					</div>
				</div>
			</div>
		</div>
@endsection