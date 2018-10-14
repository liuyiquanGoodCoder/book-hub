<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $fillable = [
    	'id', 'uid', 'role', 'ISBN', 'bname','author','pub-year','publisher','img-s','img-m','img-l','quantity','price','created_at','updated_at'
	];

}
