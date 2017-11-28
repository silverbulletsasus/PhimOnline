<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ghe extends Model
{
    protected $table = "ghe";
    protected $primaryKey = "ghe_id";
    public function phongchieu()
    {
    	return $this->belongsTo('App\PhongChieu', 'pc_id', 'ghe_id');
    }
}
