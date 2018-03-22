<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'name', 'bedrooms', 'bathrooms','parking'
    ];

    public function house()
    {
        return $this->belongsTo('App\House');
    }

  
}
