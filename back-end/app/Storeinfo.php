<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Storeinfo extends Model
{
    //
    protected $fillable = [
    	'sname', 'address', 'phone_number', 'email', 'details', 'status', 'created_at'
    ];
}
