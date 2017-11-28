<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    protected $table = "khachhang";
    protected $primaryKey = "kh_id";
    public function ve(){
        return $this->hasMany('App\Ve', 'kh_id', 'kh_id');
    }
}
