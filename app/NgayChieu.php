<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NgayChieu extends Model
{
    protected $table = "ngaychieu";
    protected $primaryKey = "nc_id";
    public function phimtrongngay()
    {
    	return $this->hasmany('App\PhimTrongNgay', 'nc_id', 'nc_id');
    }
}
