<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $fillable = [
        'house_no', 'apartment_id', 'landlord_id','type_id','price'
    ];

    public function property()
    {
        return $this->belongsTo('App\Property');
    }

    public function tenant()
    {
        return $this->belongsTo('App\Tenant');
    }

    public function house_type()
    {
        return $this->belongsTo('App\HouseType');
    }


}
