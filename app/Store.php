<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    public function Order(){
        return $this->hasMany('App\Order', 'idClient', 'id');
    }

    public function User(){
	    return $this->belongsTo('App\User', 'idUser', 'id');
	}

	public function Transaction(){
        return $this->hasMany('App\Transaction', 'idClient', 'id');
    }
}
