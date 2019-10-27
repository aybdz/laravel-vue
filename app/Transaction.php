<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //

    public function Client(){
	    return $this->belongsTo('App\Client', 'idClient', 'id');
	}

	public function Store(){
	    return $this->belongsTo('App\Store', 'idClient', 'id');
	}

	public function Provider(){
	    return $this->belongsTo('App\Provider', 'idClient', 'id');
	}

	public function Credit(){
	    return $this->belongsTo('App\Credit', 'idCredit', 'id');
	}

	public function CreditProvider(){
	    return $this->belongsTo('App\CreditProvider', 'idCredit', 'id');
	}

	public function Order(){
	    return $this->hasOne('App\Order', 'id', 'idOrder');
	}

	public function OrderProvider(){
	    return $this->hasOne('App\OrderProvider', 'id', 'idOrder');
	}
	
	public function User(){
	    return $this->belongsTo('App\User', 'idUser', 'id');
	}
}
