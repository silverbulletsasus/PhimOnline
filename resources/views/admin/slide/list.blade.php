@extends('admin.layout.master')
@section('content-change')
		<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">Slide</h1>
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
					<div class="panel-heading">Danh Sách Slide</div>
					<div class="panel-body">
						<table class="table table-hover table-striped table-bordered text-center" id="datatable">
							<thead>
								<tr>
									<th>Tiêu Đề</th>
									<th>Tên Hình Ảnh</th>
									<th>Chi Tiết</th>
									<th>Link</th>
									<th>Hình Ảnh</th>
									<th>Cập nhật</th>
									<th>Xóa</th>
								</tr>
							</thead>
							<tbody>
								@foreach($list as $row)
									<tr>
										<td>{{$row->slide_tieude}}</td>
										<td>{{$row->slide_tenhinhanh}}</td>
										<td>{{$row->slide_chitiet}}</td>
										<td>{{$row->slide_link}}</td>
										<td><img src="file-admin/upload/slide/{{$row->slide_tenhinhanh}}" width="100" height="100"></td>
										<td><a href="admin/slide/edit/{{$row->slide_id}}"><img src="file-admin/icon/edit.png"></a></td>
										<td><a href="admin/slide/delete/{{$row->slide_id}}"><img src="file-admin/icon/delete.png"></a></td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>	
				</div>
			</div>
		</div>
@endsection