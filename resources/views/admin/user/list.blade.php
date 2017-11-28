@extends('admin.layout.master')
@section('content-change')
		<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">User</h1>
		    </div>
		    <!-- /.col-lg-12 -->
		</div>
		<div class="row">
			<div class="col-md-12">
			@if(Session::has('message'))
				<div class="alert alert-{{Session::get('flag')}}">
					{{Session::get('message')}}
				</div>
			@endif
				<div class="panel panel-default">
					<div class="panel-heading">Danh Sách User</div>
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
									<th>Chức Vụ</th>
									<th>Cập nhật</th>
									<th>Xóa</th>
								</tr>
							</thead>
							<tbody>
								@foreach($user as $row)
									<tr>
										<td>{{$row->nv_username}}</td>
										<td>{{$row->nv_password}}</td>
										<td>{{$row->nv_email}}</td>
										<td>{{$row->nv_ten}}</td>
										<td>{{$row->nv_cmnd}}</td>
										<td>{{$row->nv_diachi}}</td>
										<td>{{$row->nv_sdt}}</td>
										<td>{{$row->nv_ngaysinh}}</td>
										<td>{{$row->nv_gioitinh}}</td>
										<td>{{$row->cv_id}}</td>
										<td><a href="admin/user/edit/{{$row->nv_id}}"><img src="file-admin/icon/edit.png"></a></td>
										<td><a href="admin/user/delete/{{$row->nv_id}}"><img src="file-admin/icon/delete.png"></a></td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>	
				</div>
			</div>
		</div>
@endsection