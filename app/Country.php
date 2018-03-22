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
        return $this->belongsTo('App\Landlord');
    }

    public function tenant()
    {
        return $this->belongsTo('App\Tenant);
    }

}
