<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Landlord extends Model
{
    protected $fillable = [
        'user_id', 'id_no', 'country_id','phone_no','repuation','rating'
    ];


    public function apartment()
    {
        return $this->hasMany('App\Apartment');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function country()
    {
        return $this->hasOne('App\User');
    }
}
