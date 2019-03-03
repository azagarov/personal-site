<?php

namespace App\Http\Controllers;

use App\ContactsMessage;
use Illuminate\Http\Request;
use Blog\Contracts\BlogService;

class DevelopmentController extends Controller
{
    public function ShowHomePage(Request $request, BlogService $blog) {

    	return view('development.home', [
    		'beginning' => $blog->GetPost('development-beginning', false),
	    ]);

    }


    public function ShowCV(Request $request) {
	    return view('development.cv');
    }

    public function ShowContacts(Request $request) {

	    return view('development.contacts');
    }
}
