<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

    public function User(){
	    return $this->belongsTo('App\User', 'idUser', 'id');
	}

	public function OrderDetail(){
        return $this->hasMany('App\OrderDetail', 'id', 'idProduct');
    }

    public function Stock(){
        return $this->hasMany('App\Stock', 'id', 'idProduct');
    }

    public function StoreProduct(){
        return $this->hasOne('App\StoreProduct',  'idProduct', 'id');
    }

}
