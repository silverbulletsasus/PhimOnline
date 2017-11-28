@extends('admin.layout.master')
@section('content-change')
		<div class="row">
		    <div class="col-md-12">
		        <h1 class="page-header">Hình Ảnh Phim {{$phim->phim_ten}}</h1>
		    </div>
		</div>
		<div class="row">
		    <div class="col-md-12">
		        <button class="btn btn-primary" onclick="window.location='admin/hinhanh/AddHinhAnh/{{$phim->phim_id}}'">Thêm Hình Ảnh</button>
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
					<div class="panel-heading">Danh Sách Hình Ảnh Trong Phim</div>
					<div class="panel-body">
						<table class="table table-hover table-striped table-bordered text-center" id="datatable">
							<thead>
								<tr>
									<th>Hình Ảnh</th>
									<th>Cập nhật</th>
									<th>Xóa</th>
								</tr>
							</thead>
							<tbody>
								@foreach($hinhanh as $row)
									<tr>
										<td><img src="file-admin/upload/hinhanh/{{$row->ha_ten}}" width="100" height="100"></td>
										<td><a href="admin/hinhanh/EditHinhAnh/{{$row->ha_id}}"><img src="file-admin/icon/edit.png"></a></td>
										<td><a href="admin/hinhanh/DeleteHinhAnh/{{$row->ha_id}}"><img src="file-admin/icon/delete.png"></a></td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>	
				</div>
			</div>
		</div>
@endsection