<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;
use App\PropertyType;
use App\Http\Requests;
use Illuminate\Http\Response;
use App\Http\Resources\Property as PropertyResource;
use App\Http\Resources\PropertyType as PropertyTypeResource;


class PropertyControllerApi extends Controller
{  
    

    public function index()
    {
        $properties = Property::paginate(15);
        return PropertyResource::collection($properties);
           
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
