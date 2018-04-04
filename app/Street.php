<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Street extends Model
{
    protected $fillable = [
        'name'
    ];

    public function town()
    {
        return $this->belongsTo('App\Town');
    }

    public function property()
    {
        return $this->hasMany('App\Property');
    }

}
