<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rap extends Model
{
    protected $table = "rap";
    protected $primaryKey = "rap_id";
    public function phimtrongngay()
    {
    	return $this->hasmany('App\PhimTrongNgay', 'rap_id', 'rap_id');
    }
}
