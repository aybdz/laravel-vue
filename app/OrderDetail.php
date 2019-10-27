<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //
    public function Order(){
	    return $this->belongsTo('App\Order', 'idOrder', 'id');
	}

	public function Product(){
	    return $this->belongsTo('App\Product', 'idProduct', 'id');
	}
}
