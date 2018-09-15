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
            $landlord_properties= $landlord->property;
            $types= PropertyType::all(); 
            return view('landlord.properties', [
                'landlord_properties' => PropertyResource::collection($landlord_properties),
                'landlord'=>new LandlordResource($landlord), 'property_types'=>PropertyTypeResource::collection($types)

            ]);
        }
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
        $property->name = $request->get('name');
        $property->property_type_id =$request->get('type_id');
        $property->landlord_id =  $request->get('landlord_id');
        $property->street_id = 1;
        $property->save();
        return redirect()->route('property.index')->with('status', 'property Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property= Property::find($id);
        $houses=$property->house;
        $housetypes=HouseType::all();   
        return view('house.show', [
            'housetypes' => $housetypes,
            'houses' => $houses, 
            'property'=>$property 
        ]);
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
    {
        $id=$request->get('id');
        $property= Property::find($id);
        $property->name = $request->get('name');
        $property->property_type_id =$request->get('type');
        $property->description = $request->get('description');
        $property->save();
        return redirect()->route('property.index')->with('status', 'property Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id=$request->get('id');
        $property= Property::find($id);
        $property->delete();
        return redirect()->route('property.index')->with('status', 'property Deleted!');
    }
}
