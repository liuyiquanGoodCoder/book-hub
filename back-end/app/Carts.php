<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    //
    protected $fillable = [
    	'uid' ,'bid' ,'quantity' ,'updated_at'
    ];
}
