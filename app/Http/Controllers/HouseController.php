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
    public function houses($id)
    {      
        $landlord= Auth::user()->landlord;
        $houses= House::where('property_id', $id)
        ->orderBy('created_at', 'desc')
        ->get();
        //$houses=House::all(); 
        return view('house.index', [
            'units' => $houses  
        ]);
    }

    
}
