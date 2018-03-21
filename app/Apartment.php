<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
        protected $fillable = [
        'name', 'location', 'description',
    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
