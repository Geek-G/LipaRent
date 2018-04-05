<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\PropertyType;
use App\Property;

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
            $types= PropertyType::all();   
            return view('landlord.index', [
                'types' => $types,
                'landlord' => $landlord  
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
        $property->property_type_id =$request->get('type');
        $property->landlord_id = Auth::user()->landlord->id;
        $property->street_id = 1;
        $property->description = $request->get('description');
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
        //
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
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
