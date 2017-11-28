@extends('admin.layout.master')
@section('content-change')
		<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">Phim</h1>
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
					<div class="panel-heading">Sửa phim</div>
					<div class="panel-body">
						<form action="admin/phim/EditPhim/{{$phim->phim_id}}" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div>
								<label>Tên Phim</label>
								<input type="text" class="form-control" name="txtTen" value="{{$phim->phim_ten}}">
							</div>
							<br>
							<div>
								<label>Poster Phim</label>
								<img src="file-admin/upload/poster/{{$phim->phim_poster}}" width="300px" height="200px">
								<input type="file" class="form-control" name="txtPoster">
							</div>
							<br>
							<div>
								<label>Thời lượng</label>
								<input type="text" class="form-control" name="txtThoiLuong" value="{{$phim->phim_thoiluong}}">
							</div>
							<br>
							<div>
								<label>Đạo Diễn</label>
								<input type="text" class="form-control" name="txtDaoDien" value="{{$phim->phim_daodien}}">
							</div>
							<br>
							<div>
								<label>Diễn Viên</label>
								<input type="text" class="form-control" name="txtDienVien" value="{{$phim->phim_dienvien}}">
							</div>
							<br>
							<div>
								<label>Ngày Khởi Chiếu</label>
								<input type="text" class="form-control" name="txtNgayKhoiChieu" value="{{$phim->phim_ngaykhoichieu}}">
							</div>
							<br>
							<div>
								<label>Nội Dung Phim</label>
								<textarea class="form-control" name="txtNoiDung" id="editor">{{$phim->phim_noidung}}</textarea>
							<br>
							<div>
								<label>Trailer Phim</label>
								<video width="300px" height="200px" controls=""><source src="file-admin/upload/trailer/{{$phim->phim_trailer}}" type="video/mp4"></video>
								<input type="file" class="form-control" name="txtTrailer">
							</div>
							<br>
							<div>
								<label>Thể Loại</label>
								<select name="txtTheLoai" class="form-control">
									<option value="">Chọn Thể Loại Phim</option>
									@foreach($theloai->all() as $row)
										<option 
										@if($row->tl_id == $phim->tl_id)
											{{"selected"}}
										@endif
										value="{{$row->tl_id}}">{{$row->tl_ten}}</option>
									@endforeach
								</select>
							</div>
							<br>
							<button type="submit" class="btn btn-primary" name="btnSubmit">Sửa</button>
							<button type="button" class="btn btn-primary" onclick="window.location='admin/phim/ListPhim'">Bỏ Qua</button>
						</form>
					</div>
				</div>
			</div>
		</div>
@endsection