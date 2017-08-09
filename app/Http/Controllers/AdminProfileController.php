<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProfileController extends Controller
{
    public function show() {
	    return view('admin.profile')->with([
		    //
		    'user' => Auth::user(),
		    'selectedMenuItem' => 'profile',
	    ]);

    }
}
