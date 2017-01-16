<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{
    public function add_data_page() 
    {
		return view('pages.add_data');
    }

    public function home()
    {
    	return	view('pages.home');
    }

  
}
