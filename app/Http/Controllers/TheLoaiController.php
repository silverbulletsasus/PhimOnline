<?php

namespace App\Http\Controllers;
use App\TheLoai;
use Illuminate\Http\Request;

class TheLoaiController extends Controller
{
    public function GetListTheLoai()
    {
    	$theloai = TheLoai::all();
    	return view('admin.theloai.list' , ['theloai' => $theloai]);
    }
    public function GetAddTheLoai()
    {
    	return view('admin.theloai.add');
    }
    public function PostAddTheLoai(Request $request)
    {
    	$this->validate($request, 
    		[
    			"txtTen"=>"required|unique:theloai,tl_ten",
    			"txtContent"=>"required"
    		], 
    		[
    			"txtTen.required"=>"Vui lòng nhập tên thể loại",
    			"txtTen.unique"=>"Tên thể loại đã tồn tại",
    			"txtContent.required"=>"Vui lòng nhập mô tả thể loại"
    		]
    	);	
    	$theloai = new TheLoai();
    	$theloai->tl_ten = $request->txtTen;
    	$theloai->tl_mota = $request->txtContent;
    	$theloai->save();
    	return redirect("admin/theloai/ListTheLoai")->with(['flag'=>'success', 'message'=>'Thêm Thể Loại Thành Công']);// không redirect()->view() được ???
    }
    public function GetEditTheLoai($tl_id)
    {
    	$theloai = TheLoai::find($tl_id);
    	return view('admin.theloai.edit', ['theloai' => $theloai]);
    }
    public function PostEditTheLoai(Request $request, $tl_id)
    {
        $this->validate($request, 
            [
                "txtTen"=>"required", // tên trùng nếu không để unique
                "txtContent"=>"required"
            ], 
            [
                "txtTen.required"=>"Vui lòng nhập tên thể loại",
                "txtContent.required"=>"Vui lòng nhập mô tả thể loại"
            ]
        );
        $theloai = TheLoai::find($tl_id);
        $theloai->tl_ten = $request->txtTen;
        $theloai->tl_mota = $request->txtContent;
        $theloai->save();
        return redirect("admin/theloai/EditTheLoai/".$tl_id)->with(['flag'=>'success', 'message'=>'Sửa Thể Loại Thành Công']);

    }
    public function DeleteTheLoai($tl_id)
    {
        $theloai = TheLoai::find($tl_id);
        $theloai->delete();
        return redirect('admin/theloai/ListTheLoai')->with(['flag'=>'success', 'message'=>'Xóa thể loại thành công']);
    }
}
