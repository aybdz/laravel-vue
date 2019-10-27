<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    
	public function User(){
	    return $this->belongsTo('App\User', 'idUser', 'id');
	}

	public function Client(){
	    return $this->belongsTo('App\Client', 'idClient', 'id');
	}

	public function OrderDetail(){
        return $this->hasMany('App\OrderDetail', 'idOrder', 'id');
    }

    public function Credit(){
	    return $this->hasOne('App\Credit', 'id', 'idCredit');
	}

	public function Transaction(){
        return $this->hasMany('App\Transaction', 'idUser', 'id');
    }

    public function Store(){
	    return $this->belongsTo('App\Store', 'idClient', 'id');
	}
}
