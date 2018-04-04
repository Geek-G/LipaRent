<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
        protected $fillable = [
        'name', 'location', 'description',
    ];



    public function landlord()
    {
        return $this->belongsTo('App\Landlord');
    }


    public function street()
    {
        return $this->belongsTo('App\Street');
    }

    public function house()
    {
        return $this->hasMany('App\House');
    }

}
