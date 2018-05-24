<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Town extends Resource
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
            'name'=>$this->name
            // 'landlord_id'=>$this->landlord_id,
            // 'street_id'=>$this->street_id,
            // 'property_type_id'=> $this->property_type_id,
           
            // 'description'=>$this->descripition,
            // 'image' => $this->image
        ];
        
    }
}
