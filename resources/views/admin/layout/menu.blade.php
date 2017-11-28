<div class="navbar-default sidebar" role="navigation">
	    <div class="sidebar-nav navbar-collapse">
	        <ul class="nav" id="side-menu">
	            <li class="sidebar-search">
	                <div class="input-group custom-search-form">
	                    <input type="text" class="form-control" placeholder="Search...">
	                    <span class="input-group-btn">
	                    <button class="btn btn-default" type="button">
	                        <i class="fa fa-search"></i>
	                    </button>
	                </span>
	                </div>
	                <!-- /input-group -->
	            </li>
	            <li>
	                <a href="admin"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
	            </li>
	            <li>
	                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Slide<span class="fa arrow"></span></a>
	                <ul class="nav nav-second-level">
	                    <li>
	                        <a href="{{route('ListSlide')}}">List</a>
	                    </li>
	                    <li>
	                        <a href="{{route('getAddSlide')}}">Add</a>
	                    </li>
	                </ul>
	                <!-- /.nav-second-level -->
	            </li>
<!-- 	            <li>
	                <a href="#"><i class="fa fa-wrench fa-fw"></i> Chức Vụ<span class="fa arrow"></span></a>
	                <ul class="nav nav-second-level">
	                    <li>
	                        <a href="{{route('ListChucVu')}}">List</a>
	                    </li>
	                    <li>
	                        <a href="{{route('getAddChucVu')}}">Add</a>
	                    </li>
	                </ul>
	            </li> -->
	            <li>
	                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> User<span class="fa arrow"></span></a>
	                <ul class="nav nav-second-level">
	                    <li>
	                        <a href="{{route('ListUser')}}">List</a>
	                    </li>
	                    <li>
	                        <a href="{{route('getAddUser')}}">Add</a>
	                    </li>
	                </ul>
	                <!-- /.nav-second-level -->
	            </li>
	            <li>
	                <a href="#"><i class="fa fa-wrench fa-fw"></i>Thể Loại<span class="fa arrow"></span></a>
	                <ul class="nav nav-second-level">
	                    <li>
	                        <a href="{{route('ListTheLoai')}}">List</a>
	                    </li>
	                    <li>
	                        <a href="{{route('getAddTheLoai')}}">Add</a>
	                    </li>
	                </ul>
	                <!-- /.nav-second-level -->
	            </li>
	            <li>
	                <a href="#"><i class="fa fa-sitemap fa-fw"></i> Phim<span class="fa arrow"></span></a>
	                <ul class="nav nav-second-level">
	                    <li>
	                        <a href="{{route('ListPhim')}}">List</a>
	                    </li>
	                    <li>
	                        <a href="{{route('getAddPhim')}}">Add</a>
	                    </li>
	                </ul>
	            </li>
	            <li>
	                <a href="#"><i class="fa fa-files-o fa-fw"></i> Phòng Chiếu<span class="fa arrow"></span></a>
	                <ul class="nav nav-second-level">
	                    <li>
	                        <a href="{{route('ListPhongChieu')}}">List</a>
	                    </li>
	                    <li>
	                        <a href="{{route('getAddPhongChieu')}}">Add</a>
	                    </li>
	                </ul>
	            </li>
	            <li>
	                <a href="#"><i class="fa fa-files-o fa-fw"></i> Ngày Chiếu<span class="fa arrow"></span></a>
	                <ul class="nav nav-second-level">
	                    <li>
	                        <a href="{{route('ListNgayChieu')}}">List</a>
	                    </li>
	                    <li>
	                        <a href="{{route('getAddNgayChieu')}}">Add</a>
	                    </li>
	                </ul>
	            </li>
	            <li>
	                <a href="#"><i class="fa fa-files-o fa-fw"></i> Rạp<span class="fa arrow"></span></a>
	                <ul class="nav nav-second-level">
	                    <li>
	                        <a href="{{route('ListRap')}}">List</a>
	                    </li>
	                    <li>
	                        <a href="{{route('getAddRap')}}">Add</a>
	                    </li>
	                </ul>
	            </li>
	            <li>
	                <a href="#"><i class="fa fa-files-o fa-fw"></i> Lịch Chiếu<span class="fa arrow"></span></a>
	                <ul class="nav nav-second-level">
	                    <li>
	                        <a href="{{route('ListLichChieu')}}">List</a>
	                    </li>
	                    <li>
	                        <a href="{{route('getAddLichChieu')}}">Add</a>
	                    </li>
	                </ul>
	            </li>
	            <li>
	                <a href="#"><i class="fa fa-files-o fa-fw"></i> Phim Trong Ngày<span class="fa arrow"></span></a>
	                <ul class="nav nav-second-level">
	                    <li>
	                        <a href="{{route('ListPhimTrongNgay')}}">List</a>
	                    </li>
	                    <li>
	                        <a href="{{route('getAddPhimTrongNgay')}}">Add</a>
	                    </li>
	                </ul>
	            </li>
	            <li>
	                <a href="#"><i class="fa fa-files-o fa-fw"></i> Ghế<span class="fa arrow"></span></a>
	                <ul class="nav nav-second-level">
	                    <li>
	                        <a href="{{route('ListGhe')}}">List</a>
	                    </li>
	                    <li>
	                        <a href="{{route('postAddGhe')}}">Add</a>
	                    </li>
	                </ul>
	            </li>
	            <li>
	                <a href="#"><i class="fa fa-files-o fa-fw"></i> Khách Hàng<span class="fa arrow"></span></a>
	                <ul class="nav nav-second-level">
	                    <li>
	                        <a href="{{route('ListKhachHang')}}">List</a>
	                    </li>
	                    <li>
	                        <a href="{{route('getAddKhacHang')}}">Add</a>
	                    </li>
	                </ul>
	            </li>
	            <li>
	                <a href="#"><i class="fa fa-files-o fa-fw"></i> Vé<span class="fa arrow"></span></a>
	                <ul class="nav nav-second-level">
	                    <li>
	                        <a href="">List</a>
	                    </li>
	                    <li>
	                        <a href="">Add</a>
	                    </li>
	                </ul>
	            </li>
	        </ul>
	    </div>
	    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->