<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;
use App\Landlord;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       $properties = Property::all();

        return view('properties.index', [
            'properties' => $properties
        ]);
    }

    public function create()
    {
        return view('properties.create');
    }

    public function save(Request $request)
    {
		$this->validate($request, [
	            'name' => 'required|string|max:255',
	            'description' => 'required|string|min:4'
	    ]);
		$property = new Property;
		$property->name = $request->get('name');
		$property->property_type_id =1;
		$property->landlord_id =1;
	    $property->street_id = 1;
	    $property->description = $request->get('description');
	    $property->save();

	    return redirect()->route('all_properties')->with('status', 'property Added!');
    }
	
	public function edit($id)
	{
	    $property = Property::find($id);
	    return view('properties.edit', compact('property'));
	}


	public function doEdit(Request $request)
	{
	    $property = Property::find($request->get('id'));
	    $property->name = $request->get('name');
	    $property->street_id = $request->get('location');
	    if($request->get('description')!='') 
	    	$property->description = $request->get('description');
	    $property->save();

	    return redirect()->route('all_properties')->with('status', 'Property Updated!');
	}


	public function delete($id)
	{
 		$property = Property::find($id);
	    return view('properties.delete', compact('property'));
	}

		public function doDelete(Request $request)
	{
 		$property = Property::find($request->get('id'));
	    $property->delete();

	    return redirect()->route('all_properties')->with('status', 'property deleted!');
	}


	public function show($id)
	{
	    $task = Task::find($id);
	    return View('task', compact('task'));
	}



}
