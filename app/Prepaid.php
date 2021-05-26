<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prepaid extends Model
{
    protected $table = 'prepaid';
    protected $fillable = ['mobile_number', 'value'];

    public function order(){
        return $this->belongsTo('App\Order', 'date', 'created_at');
    }
}

