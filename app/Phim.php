<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phim extends Model
{
    protected $table = "phim";
    protected $primaryKey = "phim_id";

    public function hinhanh(){
    	return $this->hasMany('App\HinhAnh', 'phim_id', 'phim_id');
    }

    public function theloai()
    {
    	return $this->belongsTo('App\TheLoai', 'tl_id', 'phim_id');
    }

    public function phimtrongngay(){
    	return $this->hasMany('App\PhimTrongNgay', 'phim_id', 'phim_id');
    }
}
