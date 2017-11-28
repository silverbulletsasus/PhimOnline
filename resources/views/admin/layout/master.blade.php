<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
    <meta name="author" content="">
	<title>Document</title>
	<base href="{{asset('')}}" >

	<link rel="stylesheet" href="file-admin/css/bootstrap.min.css">
	<!-- phim nhanh : bs3-cdn -->

	<!-- sb-admin -->
	<link href="file-admin/sb-admin2/vendor/metisMenu/metisMenu.min.css" rel="stylesheet"><!-- MetisMenu CSS -->
	<link href="file-admin/sb-admin2/dist/css/sb-admin-2.css" rel="stylesheet"><!-- Custom CSS -->
	<link href="file-admin/sb-admin2/vendor/morrisjs/morris.css" rel="stylesheet"><!-- Morris Charts CSS -->
	<link href="file-admin/sb-admin2/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"><!-- Custom Fonts -->
	<!-- end sb-admin -->


	<!-- datatable -->
	<link rel="stylesheet" href="file-admin/datatable/jquery.dataTables.min.css"> <!-- color black in pagination -->
	<link rel="stylesheet" href="file-admin/datatable/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="file-admin/datatable/dataTables.responsive.css"> 
	<!-- end datatable -->

</head>
<body>
	<div id="wrapper">
				@include('admin.layout.header')
		<div id="page-wrapper">
			<div class="container-fluid">
				@yield('content-change')
			</div>
		</div>
	
	</div>
	<!-- bootstrap -->
	<script src="file-admin/js/jquery.min.js"></script>
	<script src="file-admin/js/bootstrap.min.js"></script>
	<!-- end bootstrap -->

	<!-- sb-admin -->
	<script src="file-admin/sb-admin2/vendor/metisMenu/metisMenu.min.js"></script><!-- Metis Menu Plugin JavaScript -->
	<script src="file-admin/sb-admin2/vendor/raphael/raphael.min.js"></script><!-- Morris Charts JavaScript -->
	<script src="file-admin/sb-admin2/vendor/morrisjs/morris.min.js"></script>
	<script src="file-admin/sb-admin2/dist/js/sb-admin-2.js"></script><!-- Custom Theme JavaScript -->
	
	<!-- end sb-admin -->

	<!-- datatable -->
	<script src="file-admin/datatable/jquery.dataTables.min.js"></script>
	<script src="file-admin/datatable/dataTables.bootstrap.min.js"></script>
	<script src="file-admin/datatable/dataTables.responsive.min.js"></script> <!-- responsive datatable -->
	<script type="text/javascript">
	$(document).ready(function(){
	  var table = $('#datatable').DataTable({
	    responsive: true,
	    "language": {
	        "lengthMenu": "Hiển thị _MENU_ dòng dữ liệu trên một trang",
	        "info": "Hiển thị _START_ trong tổng số _TOTAL_ dòng dữ liệu",
	        "infoEmpty": "Dữ liệu rỗng",
	        "emptyTable": "Chưa có dữ liệu nào",
	        "processing": "Đang xử lý...",
	        "search": "Tìm kiếm:",
	        "loadingRecords": "Đang load dữ liệu...",
	        "zeroRecords": "không tìm thấy dữ liệu",
	        "infoFiltered": "(Được từ tổng số _MAX_ dòng dữ liệu)",
	        "paginate": {
	          "first": "|<",
	          "last": ">|",
	          "next": ">>",
	          "previous": "<<"
	        }
	    },
	    "lengthMenu": [[5, 10, 15, 20, 25, 30, -1], [5, 10, 15, 20, 25, 30, "Tất cả"]]
	  });
	  new $.fn.dataTable.FixedHeader(table);
	});
	</script>
	<!-- end datatable -->

	<!-- sb-admin -->
	<script src="file-admin/sb-admin2/data/morris-data.js"></script><!--bắt buộc nằm dưới datatable, nằm trên bị lỗi js -->

	<!-- end sb-admin -->

	<!-- ckeditor -->
	<script src="file-admin/ckeditor/ckeditor.js"></script>
	<script type="text/javascript">
		CKEDITOR.replace('editor');
	</script>
	<!-- end ckeditor -->
	<script src="file-admin/js/my.js"></script>
</body>
</html>