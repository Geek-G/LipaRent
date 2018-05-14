<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

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
            'landlord_id'=>$this->landlord_id,
            'street_id'=>$this->street_id,
            'property_type_id'=> $this->property_type_id,
            'name'=>$this->name,
            'description'=>$this->descripition,
            'image' => $this->image
        ];
        
    }
}
