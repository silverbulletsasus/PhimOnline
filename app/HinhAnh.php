<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HinhAnh extends Model
{
    protected $table = "hinhanh";
    protected $primaryKey = "ha_id";
    public function phim()
    {
    	return $this->belongsTo('App\Phim', 'phim_id', 'ha_id');
    }
}
