<?php

namespace App\Http\Controllers;
use App\House;

use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    private $apartment_id;
    
    public function index($id)
    {
       $apartment_id=$id;
       $houses = House::where('apartment_id', $id);
        return view('house.index', [
            'houses' => $houses
        ]);
    }
    
    public function create()
    {
        return view('house.create');
    }

    public function save(Request $request)
    {
		$this->validate($request, [
	            'name' => 'required|string|max:20',
	            'price' => 'required|integer|numeric|max:50000'
	    ]);
	    dd('making house');
		$newhouse = new House;
		$newhouse->apartment_id = 1;
	    $newhouse->landlord_id = 1;
	    $newhouse->house_no = $request->get('house_no');
	    $newhouse->type_id = $request->get('type');
        $newhouse->price = $request->get('price');
	    $newhouse->save();

        return redirect()->route('apartment_houses')->with('status', 'House Added!');
    }

}