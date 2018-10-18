<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\PropertyType;
use App\Property;
use App\HouseType;
use App\Http\Resources\Property as PropertyResource;
use App\Http\Resources\Landlord as LandlordResource;
use App\Http\Resources\PropertyType as PropertyTypeResource;

class PropertyController extends Controller
{  
    
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::user()->landlord) 
        {
            $landlord=Auth::user()->landlord; 
            //$landlord_properties= $landlord->property;
            $landlord_properties= Property::where('landlord_id', $landlord->id)
            ->orderBy('created_at', 'desc')
            ->get();
            $types= PropertyType::all(); 
            return view('landlord.properties', [
                'landlord_properties' => PropertyResource::collection($landlord_properties),
                'landlord'=>new LandlordResource($landlord), 'property_types'=>PropertyTypeResource::collection($types)

            ]);
        }
    }

    public function show($id){
        $property= Property::FindorFail($id);  
        return view('landlord.property', [
            'property' => new PropertyResource($property)
        ]);
    }
    

   
}
