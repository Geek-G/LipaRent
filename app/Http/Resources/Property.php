<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Town;
use App\PropertyType;
use App\Street;

class Property extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'description'=>$this->description,
            'town'=>$this->street->town->name,
            'type'=>$this->property_type->name,
            'street'=>$this->street->name,
        ];
        
    }
}
