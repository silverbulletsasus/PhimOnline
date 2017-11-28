@extends('admin.layout.master')
@section('content-change')
		<div class="row">
		    <div class="col-md-12">
		        <h1 class="page-header">Khách Hàng</h1>
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
					<div class="panel-heading">Danh Sách Khách Hàng</div>
					<div class="panel-body">
						<table class="table table-hover table-striped table-bordered text-center" id="datatable">
							<thead>
								<tr>
									<th>UserName</th>
									<th>Password</th>
									<th>Email</th>
									<th>Tên</th>
									<th>CMND</th>
									<th>Địa Chỉ</th>
									<th>SDT</th>
									<th>Ngày Sinh</th>
									<th>Giới Tính</th>
									<th>Tình Trạng</th>
									<th>Cập nhật</th>
									<th>Xóa</th>
								</tr>
							</thead>
							<tbody>
								@foreach($khachhang as $row)
									<tr>
										<td>{{$row->kh_username}}</td>
										<td>{{$row->kh_password}}</td>
										<td>{{$row->kh_email}}</td>
										<td>{{$row->kh_hoten}}</td>
										<td>{{$row->kh_cmnd}}</td>
										<td>{{$row->kh_diachi}}</td>
										<td>{{$row->kh_sdt}}</td>
										<td>{{$row->kh_ngaysinh}}</td>
										<td>{{$row->kh_gioitinh}}</td>
										<td>{{$row->kh_tinhtrang}}</td>
										<td><a href="admin/khachhang/EditKhachHang/{{$row->kh_id}}"><img src="file-admin/icon/edit.png"></a></td>
										<td><a href="admin/khachhang/DeleteKhachHang/{{$row->kh_id}}"><img src="file-admin/icon/delete.png"></a></td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>	
				</div>
			</div>
		</div>
@endsection