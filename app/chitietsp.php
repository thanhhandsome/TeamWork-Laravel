<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chitietsp extends Model
{
    protected $primaryKey = 'mactsp';
    protected $table = 'chitietsp';
    public function product()
    {
    	return $this->belongsTo('App\sanpham','masp');
    }
}
