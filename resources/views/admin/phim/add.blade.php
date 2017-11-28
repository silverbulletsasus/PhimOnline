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
					<div class="panel-heading">Thêm mới phim</div>
					<div class="panel-body">
						<form action="{{route('postAddPhim')}}" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div>
								<label>Tên Phim</label>
								<input type="text" class="form-control" name="txtTen" >
							</div>
							<br>
							<div>
								<label>Poster Phim</label>
								<input type="file" class="form-control" name="txtPoster">
							</div>
							<br>
							<div>
								<label>Thời lượng</label>
								<input type="text" class="form-control" name="txtThoiLuong">
							</div>
							<br>
							<div>
								<label>Đạo Diễn</label>
								<input type="text" class="form-control" name="txtDaoDien">
							</div>
							<br>
							<div>
								<label>Diễn Viên</label>
								<input type="text" class="form-control" name="txtDienVien">
							</div>
							<br>
							<div>
								<label>Ngày Khởi Chiếu</label>
								<input type="text" class="form-control" name="txtNgayKhoiChieu">
							</div>
							<br>
							<div>
								<label>Nội Dung Phim</label>
								<textarea class="form-control" name="txtNoiDung" id="editor"></textarea>
							<br>
							<div>
								<label>Trailer Phim</label>
								<input type="file" class="form-control" name="txtTrailer">
							</div>
							<br>
							<div>
								<label>Thể Loại</label>
								<select name="txtTheLoai" class="form-control">
									<option value="">Chọn Thể Loại Phim</option>
									@foreach($theloai->all() as $row)
										<option value="{{$row->tl_id}}">{{$row->tl_ten}}</option>
									@endforeach
								</select>
							</div>
							<br>
							<button type="submit" class="btn btn-primary" name="btnSubmit">Thêm Mới</button>
							<button type="button" class="btn btn-primary" onclick="window.location='admin/phim/list'">Bỏ Qua</button>
						</form>
					</div>
				</div>
			</div>
		</div>
@endsection