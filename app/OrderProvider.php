<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProvider extends Model
{
	public function User(){
	    return $this->belongsTo('App\User', 'idUser', 'id');
	}

	public function ProviderDetail(){
        return $this->hasMany('App\ProviderDetail', 'idOrder', 'id');
    }

    public function CreditProvider(){
	    return $this->hasOne('App\CreditProvider', 'id', 'idCredit');
	}
}
