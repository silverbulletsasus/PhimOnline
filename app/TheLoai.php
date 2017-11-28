<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    protected $table = "theloai";
    protected $primaryKey = "tl_id";

    public function phim(){
    	return $this->hasMany('App\Phim', 'tl_id', 'tl_id');
    }
}
