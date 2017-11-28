@extends('admin.layout.master')
@section('content-change')
		<div class="row">
		    <div class="col-md-12">
		        <h1 class="page-header">Lịch Chiếu</h1>
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
					<div class="panel-heading">Sửa lịch chiếu</div>
					<div class="panel-body">
						<form action="admin/lichchieu/EditLichChieu/{{$id}}" method="POST">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div>
								<label>Giờ</label>
								<select class="form-control" name="txtGio">
									<option value="">Chọn giờ</option>
									@for($i = 0; $i < 24; $i++)
										<option 
											@if($array[0] == $i)
											{{"selected"}}
											@endif
										value="{{$i}}">{{$i}}</option>
									@endfor
								</select>
							</div>
							<br>
							<div>
								<label>Phút</label>
								<select class="form-control" name="txtPhut">
									<option value="">Chọn phút</option>
									@for($i = 0; $i < 60; $i++)
										<option 
											@if($array[1] == $i)
											{{"selected"}}
											@endif
										value="{{$i}}">{{$i}}</option>
									@endfor
								</select>
							</div>
							<br>
							<div>
								<label>Giây</label>
								<select class="form-control" name="txtGiay">
									<option value="">Chọn giây</option>
									@for($i = 0; $i < 60; $i++)
										<option 
											@if($array[2] == $i)
											{{"selected"}}
											@endif
										value="{{$i}}">{{$i}}</option>
									@endfor
								</select>
							</div>
							<br>
							<button type="submit" class="btn btn-primary" name="btnSubmit">Sửa</button>
							<button type="button" class="btn btn-primary" onclick="window.location='admin/lichchieu/ListLichChieu'">Bỏ Qua</button>
						</form>
					</div>
				</div>
			</div>
		</div>
@endsection