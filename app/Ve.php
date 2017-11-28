<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ve extends Model
{
     protected $table = "ve";
     protected $primaryKey = "ve_id";
     public function nhanvien()
     {
     	return $this->belongsTo('App\NhanVien', 'nv_id', 've_id');
     }

     public function phimtrongngay()
     {
     	return $this->belongsTo('App\PhimTrongNgay', 'ptn_id', 've_id');
     }

    	public function khachhang()
     {
     	return $this->belongsTo('App\KhachHang', 'kh_id', 've_id');
     }
}
