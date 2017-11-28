@extends('admin.layout.master')
@section('content-change')
		<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">Thể Loại</h1>
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
					<div class="panel-heading">Danh Sách Thể Loại</div>
					<div class="panel-body">
						<table class="table table-hover table-striped table-bordered text-center" id="datatable">
							<thead>
								<tr>
									<th>Tên Thể Loại</th>
									<th>Mô Tả Thể Loại</th>
									<th>Cập nhật</th>
									<th>Xóa</th>
								</tr>
							</thead>
							<tbody>
								@foreach($theloai as $row)
									<tr>
										<td>{{$row->tl_ten}}</td>
										<td>{{$row->tl_mota}}</td>
										<td><a href="admin/theloai/EditTheLoai/{{$row->tl_id}}"><img src="file-admin/icon/edit.png"></a></td>
										<td><a href="admin/theloai/DeleteTheLoai/{{$row->tl_id}}"><img src="file-admin/icon/delete.png"></a></td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>	
				</div>
			</div>
		</div>
@endsection