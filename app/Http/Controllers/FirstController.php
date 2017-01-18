<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{
    public function addTask() 
    {
		return view('pages.addTask');
    }

    public function home()
    {
    	return	view('pages.home');
    }

  
}
