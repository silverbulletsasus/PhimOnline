<?php

namespace App\Http\Controllers;
use App\Phim;
use App\TheLoai;
use App\HinhAnh;
use Illuminate\Http\Request;

class PhimController extends Controller
{
    public function GetListPhim()
    {
    	$phim = Phim::all();
    	return view('admin.phim.list', ['phim'=>$phim]);
    }
    public function GetAddPhim()
    {
    	$theloai = TheLoai::all();
    	return view('admin.phim.add', ['theloai'=>$theloai]);
    }
    public function PostAddPhim(Request $request)
    {
    	$this->validate($request, 
    		[
    			"txtTen" => "required",
    			"txtThoiLuong" => "required",
    			"txtDaoDien" => "required",
    			"txtDienVien" => "required",
    			"txtNgayKhoiChieu" => "required",
    			"txtNoiDung" => "required",
    			"txtTheLoai" => "required",
    		], 
    		[
    			"txtTen.required" => "Nhập tên phim",
    			"txtThoiLuong.required" => "Nhập thời lượng phim",
    			"txtDaoDien.required" => "Nhập đạo diễn phim",
    			"txtDienVien.required" => "Nhập diễn viên phim",
    			"txtNgayKhoiChieu.required" => "Nhập ngày khởi chiếu phim",
    			"txtNoiDung.required" => "Nhập nội dung phim",
    			"txtTheLoai.required" => "Chọn thể loại phim"
    		]
    	);
    	$phim = new Phim();
    	$phim->phim_ten = $request->txtTen;
    	$phim->phim_thoiluong = $request->txtThoiLuong;
    	$phim->phim_daodien = $request->txtDaoDien;
    	$phim->phim_dienvien = $request->txtDienVien;
    	$phim->phim_ngaykhoichieu = $request->txtNgayKhoiChieu;
    	$phim->phim_noidung = $request->txtNoiDung;
    	$phim->tl_id = $request->txtTheLoai;
    	if($request->hasFile('txtPoster'))
    	{
    		$poster = $request->file('txtPoster');
    		$extension = $poster->getClientOriginalExtension();
    		if(($extension == "jpg") || ($extension == "jpeg") || ($extension == "png"))
    		{
    					
    		    $name = $poster->getClientOriginalName();
    		    $name = str_random(4) . "_" . $name;
    		    while(file_exists("file-admin/upload/poster".$name)) //nếu tên hình tồn tại thì random tên khác
    		    {
    		      	$name = str_random(4) . "_" . $name;
    		    }
    		  	if($request->hasFile('txtTrailer'))
    		  	{
    		  		$trailer = $request->file('txtTrailer');
    		  		$extension = $trailer->getClientOriginalExtension();
    		  		if($extension == "mp4")
    		  		{
    		  					
    		  		    $nametrailer = $trailer->getClientOriginalName();
    		  		    $nametrailer = str_random(4) . "_" . $nametrailer;
    		  		    while(file_exists("file-admin/upload/trailer".$nametrailer)) /*nếu tên hình tồn tại thì random tên khác*/
    		  		    {
    		  		      	$nametrailer = str_random(4) . "_" . $nametrailer;
    		  		    }
                        //echo $nametrailer;
    		  		    $trailer->move("file-admin/upload/trailer", $nametrailer);
    		  		  	$phim->phim_trailer = $nametrailer;
    		  		  	$poster->move("file-admin/upload/poster", $name);
    		  		  	$phim->phim_poster = $name;
    		  		  	$phim->save();
    		  		  	return redirect('admin/phim/ListPhim')->with(['flag'=>'success',  'message'=>'Thêm Phim Thành Công']); 
    		  		}
    		  		else
    		  		{
    		  		    return redirect()->back()->with(['flag'=>'danger', 'message'=>'File trailer không hợp lệ. Chỉ chọn file có đuôi mp4']);
    		  		}
    		  	}
                else
                {
                    return redirect()->back()->with(['flag'=>'danger', 'message'=>'Chưa chọn file video trailer']);
                }
    		}
    		else
    		{
    		    return redirect()->back()->with(['flag'=>'danger', 'message'=>'File ảnh không hợp lệ. Chỉ chọn file có đuôi jpg/jpeg/png']);
    		}
    	}
    	else
    	{
    		return redirect()->back()->with(['flag'=>'danger', 'message'=>'Chưa chọn file ảnh poster']);
    	}
    }
    public function GetEditPhim($phim_id)
    {
    	$phim = Phim::find($phim_id);
    	$theloai = TheLoai::all();
    	return view('admin.phim.edit', ['phim'=>$phim, 'theloai'=>$theloai]);
    }
    public function PostEditPhim(Request $request, $phim_id)
    {
    	$this->validate($request, 
    		[
    			"txtTen" => "required",
    			"txtThoiLuong" => "required",
    			"txtDaoDien" => "required",
    			"txtDienVien" => "required",
    			"txtNgayKhoiChieu" => "required",
    			"txtNoiDung" => "required",
    			"txtTheLoai" => "required",
    		], 
    		[
    			"txtTen.required" => "Nhập tên phim",
    			"txtThoiLuong.required" => "Nhập thời lượng phim",
    			"txtDaoDien.required" => "Nhập đạo diễn phim",
    			"txtDienVien.required" => "Nhập diễn viên phim",
    			"txtNgayKhoiChieu.required" => "Nhập ngày khởi chiếu phim",
    			"txtNoiDung.required" => "Nhập nội dung phim",
    			"txtTheLoai.required" => "Chọn thể loại phim"
    		]
    	);
    	$phim = Phim::find($phim_id);
    	$phim->phim_ten = $request->txtTen;
    	$phim->phim_thoiluong = $request->txtThoiLuong;
    	$phim->phim_daodien = $request->txtDaoDien;
    	$phim->phim_dienvien = $request->txtDienVien;
    	$phim->phim_ngaykhoichieu = $request->txtNgayKhoiChieu;
    	$phim->phim_noidung = $request->txtNoiDung;
    	$phim->tl_id = $request->txtTheLoai;
    	if($request->hasFile('txtPoster'))
    	{
    		$poster = $request->file('txtPoster');
    		$extension = $poster->getClientOriginalExtension();
    		if(($extension == "jpg") || ($extension == "jpeg") || ($extension == "png"))
    		{
    		    $nameposter = $poster->getClientOriginalName();
    		    $nameposter = str_random(4) . "_" . $nameposter;
    		    while(file_exists("file-admin/upload/poster".$nameposter)) /*nếu tên hình tồn tại thì random tên khác*/
    		    {
    		      	$nameposter = str_random(4) . "_" . $nameposter;
    		    }
    		  	if($request->hasFile('txtTrailer'))
    		  	{
    		  		$trailer = $request->file('txtTrailer');
    		  		$extension = $trailer->getClientOriginalExtension();
    		  		if($extension == "mp4")
    		  		{
    		  					
    		  		    $nametrailer = $trailer->getClientOriginalName();
    		  		    $nametrailer = str_random(4) . "_" . $nametrailer;
    		  		    while(file_exists("file-admin/upload/trailer".$nametrailer)) /*nếu tên hình tồn tại thì random tên khác*/
    		  		    {
    		  		      	$nametrailer = str_random(4) . "_" . $nametrailer;
    		  		    }
    		  		    $trailer->move("file-admin/upload/trailer", $nametrailer);
    		  		    unlink("file-admin/upload/trailer/".$phim->phim_trailer);
    		  		  	$phim->phim_trailer = $nametrailer;
    		  		  	$poster->move("file-admin/upload/poster", $nameposter);
    		  		  	unlink("file-admin/upload/trailer/".$phim->phim_poster);
    		  		  	$phim->phim_poster = $nameposter; 
    		  		}
    		  		else
    		  		{
    		  		    return redirect()->back()->with(['flag'=>'danger', 'message'=>'File trailer không hợp lệ. Chỉ chọn file có đuôi mp4']);
    		  		}
    		  	}
    		}
    		else
    		{
    		    return redirect()->back()->with(['flag'=>'danger', 'message'=>'File ảnh không hợp lệ. Chỉ chọn file có đuôi jpg/jpeg/png']);
    		}
    	}
        $phim->save();
        return redirect('admin/phim/EditPhim/'.$phim_id)->with(['flag'=>'success',  'message'=>' Sửa Thành Công']);
    }
    public function DeletePhim($phim_id)
    {
        $hinhanh = HinhAnh::where('phim_id', $phim_id)->get();
        foreach ($hinhanh as $row)
        {
            unlink("file-admin/upload/hinhanh/".$row->ha_ten);
        }
        HinhAnh::where('phim_id', $phim_id)->delete();
       	$phim = Phim::find($phim_id);
        unlink("file-admin/upload/poster/".$phim->phim_poster);
        unlink("file-admin/upload/trailer/".$phim->phim_trailer);
    	$phim->delete();
    	return redirect()->back()->with(['flag'=>'success', 'message'=>'Xóa Thành Công']);
    }
}
