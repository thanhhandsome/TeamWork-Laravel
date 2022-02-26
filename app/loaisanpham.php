<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaisanpham extends Model
{
	// protected $primaryKey = 'maloai';
    protected $table = 'loaisanpham';

    public function product()
    {
    	return $this->hasMany('App\sanpham');
    }
}
