<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = [
        'user_id', 'id_no','apartment_id','house_id', 'country_id','phone_no'
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function house()
    {
        return $this->hasOne('App\House');
    }

    public function apartment()
    {
        return $this->hasOne('App\Apartment');
    }

    public function country()
    {
        return $this->hasOne('App\Country');
    }
}
