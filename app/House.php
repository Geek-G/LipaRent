<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $fillable = [
        'house_no', 'apartment_id', 'landlord_id','type_id','price'
    ];

    public function landlord()
    {
        return $this->belongsTo('App\Landlord');
    }

    public function apartment()
    {
        return $this->belongsTo('App\Apartment');
    }

    public function tenant()
    {
        return $this->belongsTo('App\Tenant');
    }

    public function type()
    {
        return $this->hasOne('App\Type');
    }


}
