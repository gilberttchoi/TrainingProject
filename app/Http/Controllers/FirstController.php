<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{
    public function create() 
    {
		return view('pages.addTask');
    }

    public function home()
    {
    	return	view('pages.home');
    }

  
}
