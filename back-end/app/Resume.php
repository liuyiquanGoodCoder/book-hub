<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    //
    protected $fillable = [
    	'name', 'department', 'score', 'resume_url', 'created_at'
    ];
}
