<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LichChieu extends Model
{
    protected $table = "lichchieu";
    protected $primaryKey = "lc_id";
    public function phimtrongngay()
    {
    	return $this->hasmany('App\PhimTrongNgay', 'lc_id', 'lc_id');
    }
}
