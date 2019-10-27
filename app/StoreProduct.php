<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreProduct extends Model
{
    public function Product(){
	    return $this->hasOne('App\Product', 'id', 'idProduct');
	}

	public function Store(){
	    return $this->belongsTo('App\Store', 'idStore', 'id');
	}
}
