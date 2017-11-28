@extends('admin.layout.master')
@section('content-change')
		<div class="row">
		    <div class="col-md-12">
		        <h1 class="page-header">Phòng Chiếu</h1>
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
					<div class="panel-heading">Danh Sách Phòng Chiếu</div>
					<div class="panel-body">
						<table class="table table-hover table-striped table-bordered text-center" id="datatable">
							<thead>
								<tr>
									<th>Tên</th>
									<th>Số Chỗ</th>
									<th>Diện Tích</th>
									<th>Tình Trạng</th>
									<th>Cập Nhật</th>
									<th>Xóa</th>
								</tr>
							</thead>
							<tbody>
								@foreach($phongchieu as $row)
									<tr>
										<td>{{$row->pc_ten}}</td>
										<td>{{$row->pc_socho}}</td>
										<td>{{$row->pc_dientich}}</td>
										<td>{{$row->pc_tinhtrang}}</td>
										<td><a href="admin/phongchieu/EditPhongChieu/{{$row->pc_id}}"><img src="file-admin/icon/edit.png"></a></td>
										<td><a href="admin/phongchieu/DeletePhongChieu/{{$row->pc_id}}"><img src="file-admin/icon/delete.png"></a></td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>	
				</div>
			</div>
		</div>
@endsection