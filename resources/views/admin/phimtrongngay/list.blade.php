@extends('admin.layout.master')
@section('content-change')
		<div class="row">
		    <div class="col-md-12">
		        <h1 class="page-header">Phim Trong Ngày</h1>
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
					<div class="panel-heading">Danh Sách Phim Trong Ngày</div>
					<div class="panel-body">
						<table class="table table-hover table-striped table-bordered text-center" id="datatable">
							<thead>
								<tr>
									<th>Ngày Chiếu</th>
									<th>Lịch Chiếu</th>
									<th>Phòng Chiếu</th>
									<th>Phim</th>
									<th>Rạp</th>
									<th>Cập Nhật</th>
									<th>Xóa</th>
								</tr>
							</thead>
							<tbody>
								@foreach($phimtrongngay as $row)
									<tr>
										<td>{{$row->nc_id}}</td>
										<td>{{$row->lc_id}}</td>
										<td>{{$row->pc_id}}</td>
										<td>{{$row->phim_id}}</td>
										<td>{{$row->rap_id}}</td>
										<td><a href="admin/phimtrongngay/EditPhimTrongNgay/{{$row->ptn_id}}"><img src="file-admin/icon/edit.png"></a></td>
										<td><a href="admin/phimtrongngay/DeletePhimTrongNgay/{{$row->ptn_id}}"><img src="file-admin/icon/delete.png"></a></td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>	
				</div>
			</div>
		</div>
@endsection