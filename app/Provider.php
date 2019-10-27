<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    public function User(){
	    return $this->belongsTo('App\User', 'idUser', 'id');
	}

	public function Transaction(){
        return $this->hasMany('App\Transaction', 'IdProvider', 'id');
    }
    
    public function Stock(){
        return $this->hasMany('App\Stock', 'IdProvider', 'id');
    }
}
