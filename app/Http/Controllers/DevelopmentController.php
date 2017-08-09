<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DevelopmentController extends Controller
{
    public function ShowHomePage(Request $request) {

    	return view('development.home');
    }


    public function ShowCV(Request $request) {

	    return view('development.cv');
    }
}
