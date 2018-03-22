<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
        protected $fillable = [
        'name', 'location', 'description',
    ];



    public function landlord()
    {
        return $this->belongsTo('App\Landlord');
    }

    public function tenant()
    {
        return $this->belongsTo('App\Tenant');
    }

    public function house()
    {
        return $this->hasMany('App\House');
    }

}
