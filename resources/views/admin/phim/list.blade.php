@extends('admin.layout.master')
@section('content-change')
		<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">Phim</h1>
		    </div>
		</div>
		<div class="row">
			<div class="col-md-12">
			@if(Session::has('message'))
				<div class="alert alert-{{Session::get('flag')}}">
					{{Session::get('message')}}
				</div>
			@endif
				<div class="panel panel-default">
					<div class="panel-heading">Danh Sách Phim</div>
					<div class="panel-body">
						<table class="table table-hover table-striped table-bordered text-center" id="datatable">
							<thead>
								<tr>
									<th>Tên Phim</th>
									<th>Poster Phim</th>
									<th>Thời Lượng</th>
									<th>Đạo Diễn</th>
									<th>Diễn Viên</th>
									<th>Ngày Khởi Chiếu</th>
									<th>Nội Dung</th>
									<th>Trailer</th>
									<th>Thể Loại</th>
									<th>Hình Ảnh</th>
									<th>Cập nhật</th>
									<th>Xóa</th>
								</tr>
							</thead>
							<tbody>
								@foreach($phim as $row)
									<tr>
										<td>{{$row->phim_ten}}</td>
										<td><img src="file-admin/upload/poster/{{$row->phim_poster}}" height="150px" width="200px"></td>
										<td>{{$row->phim_thoiluong}}</td>
										<td>{{$row->phim_daodien}}</td>
										<td>{{$row->phim_dienvien}}</td>
										<td>{{$row->phim_ngaykhoichieu}}</td>
										<td>{{$row->phim_noidung}}</td>
										<td><video controls width="300px"><source src="file-admin/upload/trailer/{{$row->phim_trailer}}" type="video/mp4"></video></td>
										<td>{{$row->tl_id}}</td>
										<td><a href="admin/hinhanh/ListHinhAnh/{{$row->phim_id}}"><img src="file-admin/icon/image_edit.png"></a></td>
										<td><a href="admin/phim/EditPhim/{{$row->phim_id}}"><img src="file-admin/icon/edit.png"></a></td>
										<td><a href="admin/phim/DeletePhim/{{$row->phim_id}}"><img src="file-admin/icon/delete.png"></a></td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>	
				</div>
			</div>
		</div>
@endsection