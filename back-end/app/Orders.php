<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //
    protected $fillable = [
    	'id', 'bid', 'address_id', 'quantity', 'price', 'created_at'
    ];
    
    protected $casts = [
        'orders' => 'array',
    ];
}
