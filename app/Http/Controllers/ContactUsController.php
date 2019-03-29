<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactUsModel;

class ContactUsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	if($request->ajax()){
	    	
	    	$request->validate([
	    		'name'=>'required',
	            'email'=>'required',
	            'subject'=>'required',
	            'message'=>'required'
	        ]);

	        $contact_us = new ContactUsModel;
	        $contact_us->name = $request->name;
	        $contact_us->email = $request->email;
	        $contact_us->subject = $request->subject;
	        $contact_us->message = $request->message;
    		$contact_us->save();

            return 'OK';
        }
        return 'FAILED';
    }
}