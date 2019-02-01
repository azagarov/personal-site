<?php

namespace App\Http\Controllers;

use App\ContactsMessage;
use Illuminate\Http\Request;

class DevelopmentController extends Controller
{
    public function ShowHomePage(Request $request) {

    	return view('development.home');
    }


    public function ShowCV(Request $request) {

	    return view('development.cv');
    }

    public function ShowContacts(Request $request) {

	    return view('development.contacts');
    }
}
