<?php

namespace App\Http\Controllers;
use App\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    public function getList()
    {
    	$slide = Slide::all();
    	return view('admin.slide.list', ['list'=>$slide]);
    }

    public function GetAddSlide()
    {
    	return view('admin.slide.add');
    }

    public function PostAddSlide(Request $request)
    {
    	$this->validate($request, 
    		[
    			'txtTieuDe'=> 'required',
    			'txtChiTiet' => 'required',
    			'txtLink' => 'required'
    		], 
    		[
    			'txtTieuDe.required' => 'Vui lòng nhập tiêu đề slide',
    			'txtChiTiet.required' => 'Vui lòng nhập chi tiết slide',
    			'txtLink.required' => 'Vui lòng nhập link slide'
    		]
    	);
    	$slide = new Slide();
    	$slide->slide_tieude = $request->txtTieuDe;
    	$slide->slide_chitiet = $request->txtChiTiet;
    	$slide->slide_link = $request->txtLink;

    	if($request->hasFile('txtHinhAnh'))
    	{
    		$file = $request->file('txtHinhAnh');
    		$extension = $file->getClientOriginalExtension(); // lấy phần đuôi file
    		if(($extension == "jpg") || ($extension == "jpeg") || ($extension == "png"))
    		{
    			
                $name = $file->getClientOriginalName();
                $hinh = str_random(4) . "_" . $name;
                while(file_exists("file-admin/upload/silde".$hinh)) /*nếu tên hình tồn tại thì random tên khác*/
                {
                    $hinh = str_random(4) . "_" . $name;
                }
                $file->move("file-admin/upload/slide", $hinh);
                $slide->slide_tenhinhanh = $hinh;
                $slide->save();
                return redirect('admin/slide/add')->with(['flag'=>'success', 'message'=>'Thành Công']); // tra ve cho session // ->back() cung duoc
    		}
            else
            {
                return redirect()->back()->with(['flag'=>'danger','message'=>'File ảnh không hợp lệ. Chỉ chọn file có đuôi jpg/jpeg/png']);
            }

    	}
    	else
    	{
    		return redirect('admin/slide/add')->with(['flag'=>'danger', 'message'=>'Chưa có hình ảnh slide']);
    	}
    }

    public function GetEditSlide($slide_id)
    {
    	$slide = Slide::find($slide_id); // tim theo khoa chinh
    	return view('admin.slide.edit', ['slide' => $slide]);
    }

    public function PostEditSlide(Request $request, $slide_id)
    {
        $slide = Slide::find($slide_id);
        $this->validate($request, 
            [
                "txtTieuDe" => "required",
                "txtChiTiet" => "required",
                "txtLink" => "required",
            ], 
            [
                "txtTieuDe.required" => "Yêu cầu nhập tiêu đề",
                "txtChiTiet.required" => "Yêu cầu nhập chi tiết",
                "txtLink.required" => "Yêu cầu nhập link"
            ]
        );
        $slide->slide_tieude = $request->txtTieuDe;
        $slide->slide_chitiet = $request->txtChiTiet;
        $slide->slide_link = $request->txtLink;
        if($request->hasFile("txtHinhAnh"))
        {
            $file = $request->file('txtHinhAnh');
            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            if($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png')
            {
                $hinh = str_random(4) . "_" . $name;
                while(file_exists("file-admin/upload/silde".$hinh)) /*nếu tên hình tồn tại thì random tên khác*/
                {
                    $hinh = str_random(4) . "_" . $name;
                }
                $file->move("file-admin/upload/slide", $hinh);
                if($slide->slide_tenhinhanh != "")
                {
                    unlink("file-admin/upload/slide/".$slide->slide_tenhinhanh);
                }
                $slide->slide_tenhinhanh = $hinh;
                $slide->save();
                return redirect('admin/slide/edit/'. $slide_id)->with(['flag'=>'success', 'message'=>' Chỉnh Sửa Thành Công']);
            }
            else
            {
                return redirect()->back()->with(['flag'=>'danger', 'message'=>'File ảnh không hợp lệ. Chỉ chọn file có đuôi jpg/jpeg/png']);
            }

        }
    }

    public function Delete($slide_id)
    {
        $slide = Slide::find($slide_id);
        unlink("file-admin/upload/slide/".$slide->slide_tenhinhanh);
        $slide->delete();
        return redirect('admin/slide/list')->with(['flag'=>'success', 'message'=>'Xóa Thành Công']);
    }
}
