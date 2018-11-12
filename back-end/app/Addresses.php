<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addresses extends Model
{
    //
    protected $fillable = [
    	'id', 'user_id', 'role', 'receiver', 'countrycode', 'othercountry', 'regioncode', 'otherregion', 'citycode', 'othercity', 'addline1', 'addline2', 'postalcode', 'phonenum', 'created_at'
	];
}
