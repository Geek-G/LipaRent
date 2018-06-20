<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\House;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\Response;
use App\Http\Resources\House as HouseResource;



class HouseControllerApi extends Controller
{  
    

    public function index()
    {
        $houses = House::all();
        return HouseResource::collection($houses);
           
         //return response(Property::all()->jsonSerialize(), Response::HTTP_OK);
    }

    public function test()
    {
        echo Auth::id();
           
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
        $house = new House;
        $house->name = $request->get('name');
        $house->property_id = $request->get('property_id');
        $house->house_type_id =$request->get('housetype_id');
        $house->price = $request->get('price');
        $house->save();
    
        return new HouseResource($house);
       
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
