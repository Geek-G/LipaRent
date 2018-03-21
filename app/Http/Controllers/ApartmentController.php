<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use Illuminate\Support\Facades\Auth;

class ApartmentController extends Controller
{
    public function index()
    {
       $apartments = Apartment::all();

        return view('apartments.index', [
            'apartments' => $apartments
        ]);
    }

    public function create()
    {
        return view('apartments.create');
    }

    public function save(Request $request)
    {
		$this->validate($request, [
	            'name' => 'required|string|max:255',
	            'location' => 'required|string|max:255',
	            'description' => 'required|string|min:4'
	    ]);
		$apartment = new Apartment;
		$apartment->user_id = Auth::id();;
	    $apartment->name = $request->get('name');
	    $apartment->location = $request->get('location');
	    $apartment->description = $request->get('description');
	    $apartment->save();

	    return redirect()->route('all_apartments')->with('status', 'Apartment Added!');
    }
	
	public function edit($id)
	{
	    $apartment = Apartment::find($id);
	    return view('apartments.edit', compact('apartment'));
	}


	public function doEdit(Request $request)
	{
	    $apartment = Apartment::find($request->get('id'));
	    $apartment->name = $request->get('name');
	    $apartment->location = $request->get('location');
	    if($request->get('description')!='') 
	    	$apartment->description = $request->get('description');
	    $apartment->save();

	    return redirect()->route('all_apartments')->with('status', 'Apartment updated!');
	}


	public function delete($id)
	{
 		$apartment = Apartment::find($id);
	    return view('apartments.delete', compact('apartment'));
	}

		public function doDelete(Request $request)
	{
 		$apartment = Apartment::find($request->get('id'));
	    $apartment->delete();

	    return redirect()->route('all_apartments')->with('status', 'Apartment deleted!');
	}


	public function show($id)
	{
	    $task = Task::find($id);
	    return View('task', compact('task'));
	}



}
