<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Property;
use App\Town;
use App\Street;
use App\Landlord;
use App\PropertyType;
use App\Http\Requests;
use Illuminate\Http\Response;
use App\Http\Resources\Property as PropertyResource;
use App\Http\Resources\PropertyType as PropertyTypeResource;


class PropertyControllerApi extends Controller
{  
    
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function types()
    {
        //$properties = Property::paginate(15);
        $types= PropertyType::all(); 
        return PropertyTypeResource::collection($types);
           
         //return response(Property::all()->jsonSerialize(), Response::HTTP_OK);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  


        $request->validate([
            'name' => 'required|string|max:20|min:3',
            'type_id' => 'required|integer',
            'landlord_id' => 'required|integer'
        ]);
        $property = new Property;
        $data = $request->json()->all();
        $property->name = $data['name'];
        $property->property_type_id = $data['type_id'];
        
        $property->description = $data['description'];
        // Auth::user()->landlord->id;
        $property->landlord_id = $data['landlord_id'];
        if($data['location']['street_id']!=null&&$data['location']['street_id']!=null)
        {
            $property->street_id = $data['location']['street_id'];
        }    
        else{
            $town_name=$data['new_location']['town_name']; 
            $street_name=$data['new_location']['street_name']; 
            if($town_name!=''&& $street_name!=''){
                $town_count = Town::where('name', $town_name)->where('county_id',  $data['location']['county_id'])->count();
                if($town_count==0){
                    $town= new Town;
                    $town->name=$town_name;
                    $town->county_id = $data['location']['county_id'];
                    $town->save(); 
                }
                $the_town = Town::where('name', $town_name)->firstOrFail();
                $street_count = Street::where('name', $street_name)->where('town_id',  $data['location']['town_id'])->count();
                if($street_count==0){
                    $street= new Street;
                    $street->name=$street_name;
                    $street->town_id = $the_town->id;
                    $street->save();
                }
                $the_street = Street::where('name', $street_name)->where('town_id',$the_town->id)->firstOrFail();       
                $property->street_id = $the_street->id;
            }
        }
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
