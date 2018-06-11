<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\County;
use App\Town;
use App\Street;
use App\Http\Requests;
use Illuminate\Http\Response;
use App\Http\Resources\Street as StreetResource;
use App\Http\Resources\Town as TownResource;
use App\Http\Resources\County as CountyResource;


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
    //     $id=Input::get('countyid');
    //     $town=$request->town;
    //     $towns = DB::table('towns')->where('county_id', $id)->get();
    //    // $towns = Town::where('county_id', $id)->get();
        //$towns = Town::all();
        //the returned counties should be specific to the selected county
        return TownResource::collection($towns);
           
         //return response(Property::all()->jsonSerialize(), Response::HTTP_OK);
    }

        
    public function searchTown(Request $request)
    {    $query= $request->get('query');
         $county_id= $request->get('county_id');
         $towns= DB::table('towns')->where('county_id',$county_id)->where('name','like','%'.$query.'%')->get();
        return TownResource::collection($towns);
           
         //return response(Property::all()->jsonSerialize(), Response::HTTP_OK);
    }

            
    public function searchStreet(Request $request)
    {    $query= $request->get('query');
         $town_id= $request->get('town_id');
         $streets= DB::table('streets')->where('town_id',$town_id)->where('name','like','%'.$query.'%')->get();
        return StreetResource::collection($streets);
           
         //return response(Property::all()->jsonSerialize(), Response::HTTP_OK);
    }

    public function getStreets()
    {
        //$streets= Street::where('town_id', 1)->first();
        $streets = DB::table('streets')->where('town_id', '1')->get();
        //the returned counties should be specific to selected town
        return StreetResource::collection($streets);
           
         //return response(Property::all()->jsonSerialize(), Response::HTTP_OK);
    }


}
