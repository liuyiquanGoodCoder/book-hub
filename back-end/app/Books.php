<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $fillable = [
    	'id', 'uid', 'role', 'ISBN', 'bname','author','pub_year','publisher','img_s','img_m','img_l','quantity','price','created_at','updated_at'
	];

}
