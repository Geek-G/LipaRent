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

	    return redirect()->route('all_apartments');
    }

}
