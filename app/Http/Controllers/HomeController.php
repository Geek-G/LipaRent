<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
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
        return view('landlord.index', compact('landlord'));
        }
    }

  
}
