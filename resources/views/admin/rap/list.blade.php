@extends('admin.layout.master')
@section('content-change')
		<div class="row">
		    <div class="col-md-12">
		        <h1 class="page-header">Rạp</h1>
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
					<div class="panel-heading">Danh Sách Rạp</div>
					<div class="panel-body">
						<table class="table table-hover table-striped table-bordered text-center" id="datatable">
							<thead>
								<tr>
									<th>Tên</th>
									<th>Địa Chỉ</th>
									<th>Cập nhật</th>
									<th>Xóa</th>
								</tr>
							</thead>
							<tbody>
								@foreach($rap as $row)
									<tr>
										<td>{{$row->rap_ten}}</td>
										<td>{{$row->rap_diachi}}</td>
										<td><a href="admin/rap/EditRap/{{$row->rap_id}}"><img src="file-admin/icon/edit.png"></a></td>
										<td><a href="admin/rap/DeleteRap/{{$row->rap_id}}"><img src="file-admin/icon/delete.png"></a></td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>	
				</div>
			</div>
		</div>
@endsection