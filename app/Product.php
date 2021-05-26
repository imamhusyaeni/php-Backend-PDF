<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $fillable = ['product', 'shipping_address', 'price'];
    
    public function order(){
        return $this->belongsTo('App\Order', 'date', 'created_at');
    }
}
