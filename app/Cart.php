<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $fillable = [
        'user_id', 'coupon_id', 'details','totalPrice'
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function coupon(){
        return $this->hasMany('App\Coupon','cart_id');
    }
}
