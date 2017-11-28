@extends('giaodien.master')
@section('giaodien')
<?php
	$count = count($slide);
	$c1 = 0;
	$c2 = 0;
?>
	<!-- slide -->
	<div class="slide">
	<div class="container">
	    <!-- slide -->
	    <div class="row">
	        <div class="col-md-10 col-md-push-1">
	            <div id="myCarousel" class="carousel slide" data-ride="carousel">
	                <!-- dấu chấm chuyển dưới slide -->
	                <ol class="carousel-indicators">
	                @for($i = 0; $i < $count; $i++)
	               		
	                    <li data-target="#myCarousel" data-slide-to="{{$i}}"
	                    	@if($c1 == 0)
	                    	class="active"
	                    	@endif
	                    ></li>
	                    <?php
	                    	$c1++;
	                    ?>
	                @endfor
	                </ol>
	        
	                <!-- hình slide -->
 	                <div class="carousel-inner">
	                	@foreach($slide as $row)
	                    <div class="item @if($c2 == 0) active @endif ">
	                        <a href="{{$row->slide_link}}"><img src="file-admin/upload/slide/{{$row->slide_tenhinhanh}}"></a>
	                    </div>
	                    <?php $c2++; ?>
	                    @endforeach
	                </div>

	                <!--    Left and right controls -->
	                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
	                    <span class="glyphicon glyphicon-chevron-left"></span>
	                    <span class="sr-only">Previous</span>
	                </a>
	                <a class="right carousel-control" href="#myCarousel" data-slide="next">
	                    <span class="glyphicon glyphicon-chevron-right"></span>
	                    <span class="sr-only">Next</span>
	                </a>
	            </div>
	        </div>
	    </div>
	    <!-- end slide -->
	</div>
	</div>
	<!-- end slide -->


	
	<div class="container">
	    <!--menu phim đang chiếu hoặc sắp chiếu-->
 	    <div class="menuphim">
	        <ul>
	            <li>Phim Đang Chiếu</li>
	            <li>Phim Sắp Chiếu</li>
	        </ul>
	    </div>
	    <!--end menu phim-->
	</div> <!-- end container -->
	
	<!--container-->
 	<div class="body">
	    <div class="container">
	    	
	        <div class="row">
	        @foreach($phim as $p)
	            <div class="col-md-4"> <!--img 1-->
	                <div clas="thumbnail">
	                    <a href="chitietphim/{{$p->phim_id}}"><img src="file-admin/upload/poster/{{$p->phim_poster}}" class="img-thumbnail" height="400px"></a>
	                </div>
	            </div>
	        @endforeach    
	        </div>   
	        	 
	    </div>
	</div>
	 <!--end container-->
@endsection