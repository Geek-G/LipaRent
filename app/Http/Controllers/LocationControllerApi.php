<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;
use App\County;
use App\Town;
use App\Street;
use App\PropertyType;
use App\Http\Requests;
use Illuminate\Http\Response;
use App\Http\Resources\Street as StreetResource;
use App\Http\Resources\Town as TownResource;
use App\Http\Resources\County as CountyResource;
use App\Http\Resources\PropertyType as PropertyTypeResource;


class LocationControllerApi extends Controller
{  
    

    public function getCounties()
    {
        $counties= County::all();
        //the returned counties should be specific to landlords home country
        return CountyResource::collection($counties);
           
         //return response(Property::all()->jsonSerialize(), Response::HTTP_OK);
    }

    
    public function getTowns()
    {
        $towns= Town::all();
        //the returned counties should be specific to the selected county
        return TownResource::collection($towns);
           
         //return response(Property::all()->jsonSerialize(), Response::HTTP_OK);
    }


    public function getStreets()
    {
        $streets= Street::all();
        //the returned counties should be specific to selected town
        return StreetResource::collection($streets);
           
         //return response(Property::all()->jsonSerialize(), Response::HTTP_OK);
    }

    public function types()
    {
        //$properties = Property::paginate(15);
        $types= PropertyType::all(); 
        return PropertyTypeResource::collection($types);
           
         //return response(Property::all()->jsonSerialize(), Response::HTTP_OK);
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $property = new Property;
        $property->name = $request->input('name');
        $property->property_type_id =$request->input('type');
        // Auth::user()->landlord->id;
        $property->landlord_id = 1;
        $property->street_id = 1;
        $property->description = $request->input('description');
        $property->save();
        return new PropertyResource($property);
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property= Property::FindorFail($id);  
        return new PropertyResource($property);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {    // not working for some reason
        $property= Property::FindorFail($request->input('id'));  
        return $property;
        $property->name = $request->input('name');
        $property->property_type_id =$request->input('type');
        // Auth::user()->landlord->id;
        $property->landlord_id = 1;
        $property->street_id = 1;
        $property->description = $request->input('description');
        $property->save();
        return new PropertyResource($property);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property= Property::findOrFail($id);
        $property->delete();
        return new PropertyResource($property);
       
    }
}
