<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    //
    public function Client(){
	    return $this->belongsTo('App\Client', 'id', 'idClient');
	}

	public function Order(){
	    return $this->hasOne('App\Order', 'id', 'idOrder');
	}

	public function Transaction(){
        return $this->hasMany('App\Transaction', 'idCredit', 'id');
    }
}
