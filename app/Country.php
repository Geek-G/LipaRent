<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name', 'code'
    ];

    public function landlord()
    {
        return $this->hasMany('App\Landlord');
    }

    public function tenant()
    {
        return $this->hasMany('App\Tenant');
    }

}
