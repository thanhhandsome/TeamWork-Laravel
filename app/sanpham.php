<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
	protected $primaryKey = 'masp';
    protected $table = 'sanpham';

    public function category()
    {
    	return $this->belongsTo('App\loaisanpham','maloai');
    }

    public function details()
    {
    	return $this->hasMany('App\chitietsp');
    }
}
