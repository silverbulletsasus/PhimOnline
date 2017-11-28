@extends('admin.layout.master')
@section('content-change')
		<div class="row">
		    <div class="col-md-12">
		        <h1 class="page-header">Ngày Chiếu</h1>
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
					<div class="panel-heading">Danh Sách Ngày Chiếu</div>
					<div class="panel-body">
						<table class="table table-hover table-striped table-bordered text-center" id="datatable">
							<thead>
								<tr>
									<th>Ngày</th>
									<th>Cập Nhật</th>
									<th>Xóa</th>
								</tr>
							</thead>
							<tbody>
								@foreach($ngaychieu as $row)
									<tr>
										<td>{{$row->nc_ngay}}</td>
										<td><a href="admin/ngaychieu/EditNgayChieu/{{$row->nc_id}}"><img src="file-admin/icon/edit.png"></a></td>
										<td><a href="admin/ngaychieu/DeleteNgayChieu/{{$row->nc_id}}"><img src="file-admin/icon/delete.png"></a></td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>	
				</div>
			</div>
		</div>
@endsection