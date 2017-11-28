<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhongChieu extends Model
{
    protected $table = "phongchieu";
    protected $primaryKey = "pc_id";

    public function phimtrongngay()
    {
    	return $this->hasMany('App\PhimTrongNgay', 'pc_id', 'pc_id');
    }

    public function ghe(){
    	return $this->hasMany('App\Ghe', 'pc_id', 'pc_id');
    }
}
