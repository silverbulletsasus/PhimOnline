@extends('admin.layout.master')
@section('content-change')
		<div class="row">
		    <div class="col-md-12">
		        <h1 class="page-header">Phim Trong Ngày</h1>
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
					<div class="panel-heading">Thêm mới phim trong ngày</div>
					<div class="panel-body">
						<form action="{{route('postAddPhimTrongNgay')}}" method="POST">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div>
								<label>Ngày Chiếu</label>
								<select class="form-control" name="txtNgayChieu">
									<option value="">Chọn Ngày Chiếu</option>
									@foreach($ngaychieu as $ngay)	
									<option value="{{$ngay->nc_id}}">{{$ngay->nc_ngay}}</option>
									@endforeach
								</select>
							</div>
							<br>
							<div>
								<label>Lịch Chiếu</label>
								<select class="form-control" name="txtLichChieu">
									<option value="">Chọn Lịch Chiếu</option>
									@foreach($lichchieu as $lich)	
									<option value="{{$lich->lc_id}}">{{$lich->lc_giochieu}}</option>
									@endforeach
								</select>
							</div>
							<br>
							<div>
								<label>Phòng Chiếu</label>
								<select class="form-control" name="txtPhongChieu">
									<option value="">Chọn Phòng Chiếu</option>
									@foreach($phongchieu as $phong)	
									<option value="{{$phong->pc_id}}">{{$phong->pc_ten}}</option>
									@endforeach
								</select>
							</div>
							<br>
							<div>
								<label>Phim</label>
								<select class="form-control" name="txtPhim">
									<option value="">Chọn Phim</option>
									@foreach($phim as $p)	
									<option value="{{$p->phim_id}}">{{$p->phim_ten}}</option>
									@endforeach
								</select>
							</div>
							<br>
							<div>
								<label>Rạp</label>
								<select class="form-control" name="txtRap">
									<option value="">Chọn Rạp</option>
									@foreach($rap as $r)	
									<option value="{{$r->rap_id}}">{{$r->rap_ten}}</option>
									@endforeach
								</select>
							</div>
							<br>
							<button type="submit" class="btn btn-primary" name="btnSubmit">Thêm Mới</button>
							<button type="button" class="btn btn-primary" onclick="window.location='admin/phimtrongngay/ListPhimTrongNgay'">Bỏ Qua</button>
						</form>
					</div>
				</div>
			</div>
		</div>
@endsection