<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    /*protected $casts = [
        'email_verified_at' => 'datetime',
    ];*/

    public function Order(){
        return $this->hasMany('App\Order', 'idUser', 'id');
    }

    public function OrderProvider(){
        return $this->hasMany('App\OrderProvider', 'idUser', 'id');
    }

    public function Product(){
        return $this->hasMany('App\Product', 'idUser', 'id');
    }

    public function Client(){
        return $this->hasMany('App\Client', 'idUser', 'id');
    }

    public function Transaction(){
        return $this->hasMany('App\Transaction', 'idUser', 'id');
    }

    public function Stock(){
        return $this->hasMany('App\Stock', 'idUser', 'id');
    }

    public function productUpdate(){
        return $this->hasMany('App\productUpdate', 'idUser', 'id');
    }
}
