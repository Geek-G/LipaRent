<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HouseType extends Model
{
    protected $fillable = [
        'name', 'bedrooms', 'bathrooms','parking'
    ];

    public function house()
    {
        return $this->hasMany('App\House');
    }

  
}
