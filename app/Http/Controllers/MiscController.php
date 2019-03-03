<?php

namespace App\Http\Controllers;

use App\ContactsMessage;
use Illuminate\Http\Request;

class MiscController extends Controller
{
	public function SwitchLocale($locale) {
		session(['__currentLocale' => $locale]);
		return redirect()->back();
	}

    public function SendMessage(Request $request) {

    	$message = new ContactsMessage();
    	$message->source = $request->source;
    	$message->from_name = $request->name;
    	$message->from_email = $request->email;
    	$message->from_phone = $request->phone;
    	$message->subject = $request->subject;
    	$message->message = $request->message;
    	$message->status = 'pending';
    	$message->read = 0;
    	$message->save();

    	$response = [
		    'ok' => true,
	    ];
    	return response()->json($response);
    }
}
