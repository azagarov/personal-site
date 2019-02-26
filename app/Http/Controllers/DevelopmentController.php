<?php

namespace App\Http\Controllers;

use App\ContactsMessage;
use Illuminate\Http\Request;
use App\Contracts\Blog;

class DevelopmentController extends Controller
{
    public function ShowHomePage(Request $request, Blog $blog) {

    	return view('development.home', [
    		'beginning' => $blog->GetArticle('development-beginning', false),
	    ]);
    }


    public function ShowCV(Request $request) {

	    return view('development.cv');
    }

    public function ShowContacts(Request $request) {

	    return view('development.contacts');
    }
}
