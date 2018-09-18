<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\House;
use App\Property;
use App\HouseType;
use Auth;

class HouseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $landlord= Auth::user()->landlord;
        $properties= $landlord->property; 
       
        $housetypes=HouseType::all();
        return view('house.index', [
            'housetypes' => $housetypes,
            'properties' => $properties  
        ]);
    }

    
}
