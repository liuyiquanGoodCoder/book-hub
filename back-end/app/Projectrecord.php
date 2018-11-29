<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projectrecord extends Model
{
    //
    protected $fillable = [
    	'user_id', 'from_seller_id', 'project_id', 'details', 'price', 'created_at', 'status'
    ];
}
