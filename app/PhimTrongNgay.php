<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhimTrongNgay extends Model
{
    protected $table = "phimtrongngay";
    protected $primaryKey = "ptn_id";
    public function rap()
    {
    	return $this->belongsTo('App\Rap', 'rap_id', 'ptn_id');
    }
    public function ngaychieu()
    {
    	return $this->belongsTo('App\NgayChieu', 'nc_id', 'ptn_id');
    }
    public function phim()
    {
    	return $this->belongsTo('App\Phim', 'phim_id', 'ptn_id');
    }
    public function phongchieu()
    {
    	return $this->belongsTo('App\PhongChieu', 'pc_id', 'ptn_id');
    }
    public function lichchieu()
    {
    	return $this->belongsTo('App\LichChieu', 'lc_id', 'ptn_id');
    }
    public function ve(){
    	return $this->hasMany('App\Ve', 'ptn_id', 'ptn_id');
    }
}
