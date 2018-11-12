<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //
    protected $fillable = [
    	'id', 'bid', 'address_id', 'quantity', 'price', 'created_at', 'role'
    ];
    
    protected $casts = [
        'orders' => 'array',
    ];
}
