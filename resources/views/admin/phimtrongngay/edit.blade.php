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
						<form action="admin/phimtrongngay/EditPhimTrongNgay/{{$phim->ptn_id}}" method="POST">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div>
								<label for="txtTen">Ngày Chiếu</label>
								<select class="form-control" name="txtNgayChieu">
									<option value="">Chọn Ngày Chiếu</option>
									@foreach($ngaychieu as $ngay)	
									<option 
										@if($phim->nc_id == $ngay->nc_id)
											{{"selected"}}
										@endif
									value="{{$ngay->nc_id}}">{{$ngay->nc_ngay}}</option>
									@endforeach
								</select>
							</div>
							<br>
							<div>
								<label for="txtTen">Lịch Chiếu</label>
								<select class="form-control" name="txtLichChieu">
									<option value="">Chọn Lịch Chiếu</option>
									@foreach($lichchieu as $lich)	
									<option 
										@if($phim->lc_id == $lich->lc_id)
											{{"selected"}}
										@endif
									value="{{$lich->lc_id}}">{{$lich->lc_giochieu}}</option>
									@endforeach
								</select>
							</div>
							<br>
							<div>
								<label for="txtTen">Phòng Chiếu</label>
								<select class="form-control" name="txtPhongChieu">
									<option value="">Chọn Phòng Chiếu</option>
									@foreach($phongchieu as $phong)	
									<option
									 	@if($phim->pc_id == $phong->pc_id)
									 		{{"selected"}}
									 	@endif
									value="{{$phong->pc_id}}">{{$phong->pc_ten}}</option>
									@endforeach
								</select>
							</div>
							<br>
							<div>
								<label for="txtTen">Phim</label>
								<select class="form-control" name="txtPhim">
									<option value="">Chọn Phim</option>
									@foreach($phimchieu as $p)	
									<option 
										@if($phim->phim_id == $p->phim_id)
											{{"selected"}}
										@endif
									value="{{$p->phim_id}}">{{$p->phim_ten}}</option>
									@endforeach
								</select>
							</div>
							<br>
							<div>
								<label for="txtTen">Rạp</label>
								<select class="form-control" name="txtRap">
									<option value="">Chọn Rạp</option>
									@foreach($rap as $r)	
									<option 
										@if($phim->rap_id == $r->rap_id)
											{{"selected"}}
										@endif
									value="{{$r->rap_id}}">{{$r->rap_ten}}</option>
									@endforeach
								</select>
							</div>
							<br>
							<button type="submit" class="btn btn-primary" name="btnSubmit">Sửa</button>
							<button type="button" class="btn btn-primary" onclick="window.location='admin/phimtrongngay/ListPhimTrongNgay'">Bỏ Qua</button>
						</form>
					</div>
				</div>
			</div>
		</div>
@endsection