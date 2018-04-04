<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    protected $fillable = [
        'name'
    ];

    public function county()
    {
        return $this->belongsTo('App\County');
    }

    public function street()
    {
        return $this->hasMany('App\Street');
    }

}
