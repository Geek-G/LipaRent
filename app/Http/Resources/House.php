<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class House extends Resource
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
            'price'=>$this->price,
            'tenant_id'=>$this->tenant_id,
            'property_id'=>$this->property_id,
            'house_type_id'=>$this->house_type_id
        ];
        
    }
}
