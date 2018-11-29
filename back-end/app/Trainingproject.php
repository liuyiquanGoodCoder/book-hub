<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainingproject extends Model
{
    //
    protected $fillable = [
    	'name', 'quantity', 'details', 'budget', 'startdat', 'enddat', 'created_at'
    ];
}
