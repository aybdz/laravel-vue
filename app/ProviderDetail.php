<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProviderDetail extends Model
{
	public function Product(){
	    return $this->belongsTo('App\Product', 'idProduct', 'id');
	}

	public function OrderProvider(){
	    return $this->belongsTo('App\OrderProvider', 'idOrder', 'id');
	}

    
}
