<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    protected $fillable = [
        'name'
    ];

    public function country()
    {
        return $this->BelongsTo('App\Country');
    }

    public function town()
    {
        return $this->hasMany('App\Town');
    }

    

}
