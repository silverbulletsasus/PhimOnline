<?php

namespace App\Http\Controllers;
use App\Rap;
use Illuminate\Http\Request;

class RapController extends Controller
{
    public function GetListRap()
    {
    	$rap = Rap::all();
    	return view('admin.rap.list', ['rap'=>$rap]);	
    }
    public function GetAddRap()
    {
    	return view('admin.rap.add');
    }
    public function PostAddRap(Request $request)
    {
    	$this->validate($request, 
    		[
    			"txtTen" => "required",
    			"txtDiaChi" => "required"
    		], 
    		[
    			"txtTen.required" => "Vui lòng nhập tên rạp",
    			"txtDiaChi.required" => "Vui lòng nhập địa chỉ rạp"
    		]
    	);
    	$rap = new Rap();
    	$rap->rap_ten = $request->txtTen;
    	$rap->rap_diachi = $request->txtDiaChi;
    	$rap->save();
    	return redirect('admin/rap/ListRap')->with(['flag'=>'success', 'message'=>'Thêm mới rạp thành công']);
    }
    public function GetEditRap($rap_id)
    {
    	$rap = Rap::find($rap_id);
    	return view('admin.rap.edit', ['rap'=>$rap]);
    }
    public function PostEditRap(Request $request, $rap_id)
    {
    	$this->validate($request, 
    		[
    			"txtTen" => "required",
    			"txtDiaChi" => "required"
    		], 
    		[
    			"txtTen.required" => "Vui lòng nhập tên rạp",
    			"txtDiaChi.required" => "Vui lòng nhập địa chỉ rạp"
    		]
    	);
    	$rap = Rap::find($rap_id);
    	$rap->rap_ten = $request->txtTen;
    	$rap->rap_diachi = $request->txtDiaChi;
    	$rap->save();
    	return redirect()->back()->with(['flag'=>'success', 'message'=>'Sửa thành công']);
    }
    public function DeleteRap($rap_id)
    {
    	$rap = Rap::find($rap_id);
    	$rap->delete();
    	return redirect()->back()->with(['flag' => 'success', 'message' => 'Xóa thành công']);
    }}
