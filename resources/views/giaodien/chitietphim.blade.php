@extends('giaodien.master')
@section('giaodien')
		<div class="chitiet">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="img">
                            <img src="file-admin/upload/poster/{{$phim->phim_poster}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="thongtinphim">
                            <h3>{{$phim->phim_ten}}</h3>
                            <div class="rowcontent"><span class="title">Khởi chiếu</span><span class="content">{{$phim->phim_ngaykhoichieu}}</span></div>
                            <div class="rowcontent"><span class="title">Loại phim</span><span class="content">Hành Động, Viễn Tưởng, Hồi Hộp</span></div>
                            <div class="rowcontent"><span class="title">Diễn viên</span><span class="content">{{$phim->phim_dienvien}}</span></div>
                            <div class="rowcontent"><span class="title">Đạo diễn</span><span class="content">{{$phim->phim_daodien}}</span></div>
                            <div class="rowcontent"><span class="title">Thời lượng</span><span class="content">{{$phim->phim_thoiluong}}</span></div>
                            <div class="rowcontent"><span class="title">Phiên bản</span><span class="content">3D Digital với phụ đề tiếng Việt</span></div>
                            <div class="rowcontent"><span class="title">Cụm rạp</span><span class="content">Lotte Cinema Toàn Quốc</span></div>

                            <button type="button" id="myBtn" class="btn btn-primary" onclick="window.location='datve/{{$phim->phim_id}}'">ĐẶT VÉ</button>

                        </div>
					</div>
				</div>
			</div>
		</div>
        
        <div class="noidungphim">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="video text-center">
                            <video controls width="auto" height="300px">
                                <source src="file-admin/upload/trailer/{{$phim->phim_trailer}}" type="video/mp4">
                            </video>
                        </div>
                        <div class="mota">{{$phim->phim_noidung}}</div>
                        @foreach($hinh as $h)
                        <div class="text-center img-noidungphim">
                            <img src="file-admin/upload/hinhanh/{{$h->ha_ten}}">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
@endsection