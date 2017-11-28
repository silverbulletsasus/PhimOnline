<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Phim;
use App\HinhAnh;
use Illuminate\Http\Request;
class GiaoDienController extends Controller
{
    public function index()
    {
    	//$slide = DB::table('slide')->orderBy('updated_at', 'desc')->take(3)->get();
    	$slide = Slide::orderBy('updated_at', 'desc')->take(3)->get();
    	//$slide = Slide::all();
    	//print_r($slide);
    	$phim = Phim::orderBy('updated_at', 'desc')->take(6)->get();
    	return view('giaodien.index', ['slide' => $slide, 'phim' => $phim]);
    }
    public function chitiet($phim_id)
    {
    	$phim = Phim::find($phim_id);
    	$hinh = HinhAnh::where('phim_id', $phim_id)->orderBy('ha_id')->get();
    	return view('giaodien.chitietphim', ['phim' => $phim, 'hinh' => $hinh]);
    }
    public function datve($phim_id)
    {
    	return view('giaodien.datve');
    }
}
