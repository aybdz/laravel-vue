<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productUpdate extends Model
{
    public function User(){
	    return $this->belongsTo('App\User', 'idUser', 'id');
	}

	public function Product(){
	    return $this->belongsTo('App\Product', 'id', 'idProduct');
	}
}
