<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'GiaoDienController@index');
Route::get('chitietphim/{phim_id}',[
	'as' => 'chitietphim',
	'uses' => 'GiaoDienController@chitiet'
]);
Route::get('datve/{{phim_id}}',[
	'as' => 'datve',
	'uses' => 'GiaoDienController@datve'
]);

/*Route::get('dangky', [
	'as'=>'dangky',
	'uses'=>'UserController@getSignin'
]);

Route::post('dangky', [
	'as'=>'dangky',
	'uses'=>'UserController@postSignin'
]);*/



Route::get('admin', function(){
	return view('admin.layout.index');
	/*return "123";*/
});

Route::get('admin/dangnhap',
	[
		'as'=>'admin/dangnhap',
		'uses' => 'UserController@getLogin'
	]);
Route::post('admin/dangnhap',['as' => 'login', 'uses' => 'UserController@postLogin']);
Route::get('admin/logout', 'UserController@logout');

Route::group(['prefix'=>'admin', 'middleware'=>'adminLogin'], function(){

	/*-------------------------------*/
	Route::group(['prefix'=>'slide'], function(){
		Route::get('list', [
			'as'=>'ListSlide',
			'uses'=> 'SlideController@getList'
		]);
		Route::get('add', [
			'as' => 'getAddSlide',
			'uses' => 'SlideController@GetAddSlide'
		]);
		Route::post('add', [
			'as' => 'postAddSlide',
			'uses' => 'SlideController@PostAddSlide'
		]);
		Route::get('edit/{slide_id}', [
			'as' => 'getEditSlide',
			'uses' => 'SlideController@GetEditSlide'
		]);
		Route::post('edit/{slide_id}', [
			'as' => 'postEditSlide',
			'uses' => 'SlideController@PostEditSlide'
		]);
		Route::get('delete/{slide_id}', 'SlideController@Delete');

	});
	/*-------------------------------*/

	/*-------------------------------*/
	Route::group(['prefix'=>'chucvu'], function(){
		Route::get('list', [
			'as' => 'ListChucVu',
			'uses' => 'ChucVuController@GetList'
		]);

		Route::get('add', [
			'as' => 'getAddChucVu',
			'uses' => 'ChucVuController@GetAddChucVu'
		]);

		Route::post('add', [
			'as' => 'postAddChucVu',
			'uses' => 'ChucVuController@PostAddChucVu'
		]);
		Route::get('edit/{cv_id}', [
			'as' => 'getEditChucVu',
			'uses' => 'ChucVuController@GetEditChucVu'
		]);
		Route::post('edit/{cv_id}', [
			'as' => 'postEditChucVu',
			'uses' => 'ChucVuController@PostEditChucVu'
		]);
		Route::get('delete/{cv_id}', 'ChucVuController@Delete');

	});
	/*-------------------------------*/


	/*-------------------------------*/
	Route::group(['prefix'=>'user'], function(){
		Route::get('dangnhap', [
			'as'=>'dangnhap',
			'uses'=>'UserController@getLogin'
		]);
		Route::post('dangnhap', [
			'as'=>'dangnhap',
			'uses'=>'UserController@postLogin'
		]);


		Route::get('list', [
			'as' => 'ListUser',
			'uses' => 'UserController@GetListUser'
		]);
		Route::get('add', [
			'as' => 'getAddUser',
			'uses' => 'UserController@GetAddUser'
		]);
		Route::post('add', [
			'as' => 'postAddUser',
			'uses' => 'UserController@PostAddUser'
		]);
		Route::get('edit/{nv_id}', [
			'as' => 'getEditUser',
			'uses' => 'UserController@GetEditUser'
		]);
		Route::post('edit/{nv_id}', [
			'as' => 'postEditUser',
			'uses' => 'UserController@PostEditUser'
		]);
		Route::get('delete/{nv_id}', 'UserController@Delete');
	});
	/*-------------------------------*/
	/*chưa sửa hoàn chỉnh*/

	/*-------------------------------*/
	Route::group(['prefix'=>'theloai'], function(){
		Route::get('ListTheLoai', [
			'as' => 'ListTheLoai',
			'uses' => 'TheLoaiController@GetListTheLoai'
		]);
		Route::get('AddTheLoai', [
			'as' => 'getAddTheLoai',
			'uses' => 'TheLoaiController@GetAddTheLoai'
		]);
		Route::post('AddTheLoai', [
			'as' => 'postAddTheLoai',
			'uses' => 'TheLoaiController@PostAddTheLoai'
		]);
		Route::get('EditTheLoai/{tl_id}', [
			'as' => 'getEditTheLoai',
			'uses' => 'TheLoaiController@GetEditTheLoai'
		]);
		Route::post('EditTheLoai/{tl_id}', [
			'as' => 'postEditTheLoai',
			'uses' => 'TheLoaiController@PostEditTheLoai'
		]);
		Route::get('DeleteTheLoai/{tl_id}', 'TheLoaiController@DeleteTheLoai');
	});
	/*-------------------------------*/

	/*-------------------------------*/
	Route::group(['prefix'=>'phim'], function(){
		Route::get('ListPhim', [
			'as' => 'ListPhim',
			'uses' => 'PhimController@GetListPhim'
		]);
		Route::get('AddPhim', [
			'as' => 'getAddPhim',
			'uses' => 'PhimController@GetAddPhim'
		]);
		Route::post('AddPhim', [
			'as' => 'postAddPhim',
			'uses' => 'PhimController@PostAddPhim'
		]);
		Route::get('EditPhim/{phim_id}', [
			'as' => 'getEditPhim',
			'uses' => 'PhimController@GetEditPhim'
		]);
		Route::post('EditPhim/{phim_id}', [
			'as' => 'postEditPhim',
			'uses' => 'PhimController@PostEditPhim'
		]);
		Route::get('DeletePhim/{phim_id}', 'PhimController@DeletePhim');
	});
	/*-------------------------------*/

	/*-------------------------------*/
	Route::group(['prefix'=>'hinhanh'], function(){
		Route::get('ListHinhAnh/{phim_id}', [
			'as' => 'ListHinhAnh',
			'uses' => 'HinhAnhController@GetListHinhAnh'
		]);
		Route::get('AddHinhAnh/{phim_id}', [
			'as' => 'getAddHinhAnh',
			'uses' => 'HinhAnhController@getAddHinhAnh'
		]);
		Route::post('AddHinhAnh/{phim_id}', [
			'as' => 'postAddHinhAnh',
			'uses' => 'HinhAnhController@postAddHinhAnh'
		]);
		Route::get('EditHinhAnh/{hinhanh_id}', [
			'as' => 'getEditHinhAnh',
			'uses' => 'HinhAnhController@GetEditHinhAnh'
		]);
		Route::post('EditHinhAnh/{hinhanh_id}', [
			'as' => 'postEditHinhAnh',
			'uses' => 'HinhAnhController@PostEditHinhAnh'
		]);
		Route::get('DeleteHinhAnh/{hinhanh_id}', 'HinhAnhController@DeleteHinhAnh');
	});
	/*-------------------------------*/

	/*-------------------------------*/
	Route::group(['prefix'=>'phongchieu'], function(){
		Route::get('ListPhongChieu', [
			'as' => 'ListPhongChieu',
			'uses' => 'PhongChieuController@GetListPhongChieu'
		]);
		Route::get('AddPhongChieu', [
			'as' => 'getAddPhongChieu',
			'uses' => 'PhongChieuController@GetAddPhongChieu'
		]);
		Route::post('AddPhongChieu', [
			'as' => 'postAddPhongChieu',
			'uses' => 'PhongChieuController@PostAddPhongChieu'
		]);
		Route::get('EditPhongChieu/{pc_id}', [
			'as' => 'getEditPhongChieu',
			'uses' => 'PhongChieuController@GetEditPhongChieu'
		]);
		Route::post('EditPhongChieu/{pc_id}', [
			'as' => 'postEditPhongChieu',
			'uses' => 'PhongChieuController@PostEditPhongChieu'
		]);
		Route::get('DeletePhongChieu/{pc_id}', 'PhongChieuController@DeletePhongChieu');
	});
	/*-------------------------------*/

	/*-------------------------------*/
	Route::group(['prefix'=>'ngaychieu'], function(){
		Route::get('ListNgayChieu', [
			'as' => 'ListNgayChieu',
			'uses' => 'NgayChieuController@GetListNgayChieu'
		]);
		Route::get('AddNgayChieu', [
			'as' => 'getAddNgayChieu',
			'uses' => 'NgayChieuController@GetAddNgayChieu'
		]);
		Route::post('AddNgayChieu', [
			'as' => 'postAddNgayChieu',
			'uses' => 'NgayChieuController@PostAddNgayChieu'
		]);
		Route::get('EditNgayChieu/{nc_id}', [
			'as' => 'getEditNgayChieu',
			'uses' => 'NgayChieuController@GetEditNgayChieu'
		]);
		Route::post('EditNgayChieu/{nc_id}', [
			'as' => 'postEditNgayChieu',
			'uses' => 'NgayChieuController@PostEditNgayChieu'
		]);
		Route::get('DeleteNgayChieu/{nc_id}', 'NgayChieuController@DeleteNgayChieu');
	});
	/*-------------------------------*/

	/*-------------------------------*/
	Route::group(['prefix'=>'rap'], function(){
		Route::get('ListRap', [
			'as' => 'ListRap',
			'uses' => 'RapController@GetListRap'
		]);
		Route::get('AddRap', [
			'as' => 'getAddRap',
			'uses' => 'RapController@GetAddRap'
		]);
		Route::post('AddRap', [
			'as' => 'postAddRap',
			'uses' => 'RapController@PostAddRap'
		]);
		Route::get('EditRap/{rap_id}', [
			'as' => 'getEditRap',
			'uses' => 'RapController@GetEditRap'
		]);
		Route::post('EditRap/{rap_id}', [
			'as' => 'postEditRap',
			'uses' => 'RapController@PostEditRap'
		]);
		Route::get('DeleteRap/{rap_id}', 'RapController@DeleteRap');
	});
	/*-------------------------------*/

	/*-------------------------------*/
	Route::group(['prefix'=>'lichchieu'], function(){
		Route::get('ListLichChieu', [
			'as' => 'ListLichChieu',
			'uses' => 'LichChieuController@GetListLichChieu'
		]);
		Route::get('AddLichChieu', [
			'as' => 'getAddLichChieu',
			'uses' => 'LichChieuController@GetAddLichChieu'
		]);
		Route::post('AddLichChieu', [
			'as' => 'postAddLichChieu',
			'uses' => 'LichChieuController@PostAddLichChieu'
		]);
		Route::get('EditLichChieu/{lc_id}', [
			'as' => 'getEditLichChieu',
			'uses' => 'LichChieuController@GetEditLichChieu'
		]);
		Route::post('EditLichChieu/{lc_id}', [
			'as' => 'postEditLichChieu',
			'uses' => 'LichChieuController@PostEditLichChieu'
		]);
		Route::get('DeleteLichChieu/{lc_id}', 'LichChieuController@DeleteLichChieu');
	});
	/*-------------------------------*/

	/*-------------------------------*/
	Route::group(['prefix'=>'phimtrongngay'], function(){
		Route::get('ListPhimTrongNgay', [
			'as' => 'ListPhimTrongNgay',
			'uses' => 'PhimTrongNgayController@ListPhimTrongNgay'
		]);
		Route::get('AddPhimTrongNgay', [
			'as' => 'getAddPhimTrongNgay',
			'uses' => 'PhimTrongNgayController@GetAddPhimTrongNgay'
		]);
		Route::post('AddPhimTrongNgay', [
			'as' => 'postAddPhimTrongNgay',
			'uses' => 'PhimTrongNgayController@PostAddPhimTrongNgay'
		]);
		Route::get('EditPhimTrongNgay/{ptn_id}', [
			'as' => 'getEditPhimTrongNgay',
			'uses' => 'PhimTrongNgayController@GetEditPhimTrongNgay'
		]);
		Route::post('EditPhimTrongNgay/{ptn_id}', [
			'as' => 'postEditPhimTrongNgay',
			'uses' => 'PhimTrongNgayController@PostEditPhimTrongNgay'
		]);
		Route::get('DeletePhimTrongNgay/{ptn_id}', 'PhimTrongNgayController@DeletePhimTrongNgay');
	});
	/*-------------------------------*/

	/*-------------------------------*/
	Route::group(['prefix'=>'ghe'], function(){
		Route::get('ListGhe', [
			'as' => 'ListGhe',
			'uses' => 'GheController@ListGhe'
		]);
		Route::get('AddGhe', [
			'as' => 'getAddGhe',
			'uses' => 'GheController@GetAddGhe'
		]);
		Route::post('AddGhe', [
			'as' => 'postAddGhe',
			'uses' => 'GheController@PostAddGhe'
		]);
		Route::get('EditGhe/{ghe_id}', [
			'as' => 'getEditGhe',
			'uses' => 'GheController@GetEditGhe'
		]);
		Route::post('EditGhe/{ghe_id}', [
			'as' => 'postEditGhe',
			'uses' => 'GheController@PostEditGhe'
		]);
		Route::get('DeleteGhe/{ghe_id}', 'GheController@DeleteGhe');
	});
	/*-------------------------------*/

	/*-------------------------------*/
	Route::group(['prefix'=>'khachhang'], function(){
		Route::get('ListKhachHang', [
			'as' => 'ListKhachHang',
			'uses' => 'KhachHangController@ListKhachHang'
		]);
		Route::get('AddKhachHang', [
			'as' => 'getAddKhacHang',
			'uses' => 'KhachHangController@GetAddKhachHang'
		]);
		Route::post('AddKhachHang', [
			'as' => 'postAddKhachHang',
			'uses' => 'KhachHangController@PostAddKhachHang'
		]);
		Route::get('EditKhachHang/{kh_id}', [
			'as' => 'getEditKhachHang',
			'uses' => 'KhachHangController@GetEditKhachHang'
		]);
		Route::post('EditKhachHang/{kh_id}', [
			'as' => 'postEditKhachHang',
			'uses' => 'KhachHangController@PostEditKhachHang'
		]);
		Route::get('DeleteKhachHang/{kh_id}', 'KhachHangController@DeleteKhachHang');
	});
	/*-------------------------------*/

	/*-------------------------------*/
/*	Route::group(['prefix'=>'ve'], function(){
		Route::get('ListVe', [
			'as' => 'ListVe',
			'uses' => 'VeController@ListVe'
		]);
		Route::get('AddKhachHang', [
			'as' => 'getAddKhacHang',
			'uses' => 'KhachHangController@GetAddKhachHang'
		]);
		Route::post('AddKhachHang', [
			'as' => 'postAddKhachHang',
			'uses' => 'KhachHangController@PostAddKhachHang'
		]);
		Route::get('EditKhachHang/{kh_id}', [
			'as' => 'getEditKhachHang',
			'uses' => 'KhachHangController@GetEditKhachHang'
		]);
		Route::post('EditKhachHang/{kh_id}', [
			'as' => 'postEditKhachHang',
			'uses' => 'KhachHangController@PostEditKhachHang'
		]);
		Route::get('DeleteKhachHang/{kh_id}', 'KhachHangController@DeleteKhachHang');
	});
	/*-------------------------------*/
});
