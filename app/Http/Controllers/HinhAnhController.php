<?php

namespace App\Http\Controllers;
use App\HinhAnh;
use App\Phim;
use Illuminate\Http\Request;

class HinhAnhController extends Controller
{
	public function GetListHinhAnh($phim_id)
	{
		$phim = Phim::find($phim_id);
		$hinhanh = HinhAnh::where('phim_id', $phim_id)->get();
		return view('admin.hinhanh.list', ['hinhanh' => $hinhanh, 'phim'=>$phim]);
	}
	public function getAddHinhAnh($phim_id)
	{
		return view('admin.hinhanh.add', ['phim_id'=>$phim_id]);
	}
	public function postAddHinhAnh(Request $request, $phim_id)
	{
		if($request->hasFile('txtHinhAnh'))
		{
			$hinhanh = $request->file('txtHinhAnh');
			$extension = $hinhanh->getClientOriginalExtension();
			if($extension == "jpg" || $extension == "jpeg" || $extension == "png")
			{
				$name = $hinhanh->getClientOriginalName();
				$name = str_random(4) . "_" . $name;
				while(file_exists("file-admin/upload/hinhanh".$name)) /*nếu tên hình tồn tại thì random tên khác*/
				{
				    $name = str_random(4) . "_" . $name;
				}
				$hinhanh->move("file-admin/upload/hinhanh", $name);
				$anh = new HinhAnh();
				$anh->ha_ten = $name;
				$anh->phim_id = $phim_id;
				$anh->save();
				return redirect('admin/hinhanh/ListHinhAnh/'.$phim_id)->with(['flag'=>'success', 'message' => 'Thêm hình ảnh thành công']);
			}

		}
		else
		{
			return redirect()->back()->with(['flag'=>'danger', 'message'=>'Không có file ảnh']);
		}
	}
	public function GetEditHinhAnh($hinhanh_id)
	{
		$hinhanh = HinhAnh::find($hinhanh_id);
		return view('admin.hinhanh.edit', ['hinhanh'=>$hinhanh]);
	}
	public function PostEditHinhAnh(Request $request, $hinhanh_id)
	{
		if($request->hasFile('txtHinhAnh'))
		{
			$hinhanh = $request->file('txtHinhAnh');
			$extension = $hinhanh->getClientOriginalExtension();
			if($extension == "jpg" || $extension == "jpeg" || $extension == "png")
			{
				$name = $hinhanh->getClientOriginalName();
				$name = str_random(4) . "_" . $name;
				while(file_exists("file-admin/upload/hinhanh".$name)) /*nếu tên hình tồn tại thì random tên khác*/
				{
				    $name = str_random(4) . "_" . $name;
				}
				$hinhanh->move("file-admin/upload/hinhanh", $name);
				$anh = HinhAnh::find($hinhanh_id);
				unlink("file-admin/upload/hinhanh/".$anh->ha_ten);
				$anh->ha_ten = $name;
				$anh->save();
				return redirect('admin/hinhanh/EditHinhAnh/'.$hinhanh_id)->with(['flag'=>'success', 'message' => 'Sửa hình ảnh thành công']);
			}

		}
		else
		{
			return redirect()->back()->with(['flag'=>'danger', 'message'=>'Không có file ảnh']);
		}
	}
	public function DeleteHinhAnh($hinhanh_id)
	{
		$hinhanh = HinhAnh::find($hinhanh_id);
		unlink("file-admin/upload/hinhanh/".$hinhanh->ha_ten);
		$hinhanh->delete();
		return redirect()->back()->with(['flag'=>'success', 'message'=>'Xóa hình ảnh thành công']);
	}
}
