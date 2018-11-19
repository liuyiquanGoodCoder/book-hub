<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = [
    	'pname', 'details', 'price', 'status', 'created_at'
    ];
    public function projectrecords()
    {
        return $this->hasMany(Projectrecord::class);
    }
}
