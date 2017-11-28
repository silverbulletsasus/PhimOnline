<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
    <meta name="author" content="">
	<title>Hệ Thống Phim</title>
	<base href="{{asset('')}}" >

	<link rel="stylesheet" href="file-admin/css/bootstrap.min.css">
	<!-- phim nhanh : bs3-cdn -->
	<link rel="stylesheet" href="file-admin/css/style.css" >
	<link rel="stylesheet" href="file-admin/css/bootstrap-theme.min.css">
</head>
<body>
	@include('giaodien.header')
	@yield('giaodien')
	@include('giaodien.footer')


	<!-- bootstrap -->
	<script src="file-admin/js/jquery.min.js"></script>
	<script src="file-admin/js/bootstrap.min.js"></script>
	<!-- end bootstrap -->
</body>
</html>