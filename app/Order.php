<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $fillable = ['order_no', 'total','date','email','type'];
    public $timestamps = false;

    public function prepaid(){
        return $this->hasOne('App\Prepaid', 'created_at', 'date');
    }
    
    public function product(){
        return $this->hasOne('App\Product', 'created_at', 'date');
    }

    public function user(){
        return $this->belongsTo('App\User', 'email', 'email');
    }
}
