<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    //
    protected $fillable = [
        'code'
    ];
    public function coupon(){
        return $this->belongsTo('App\Coupon');
    }
}
