<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Mail;

class ContactController extends Controller
{
    // Create Contact Form
    public function createForm(Request $request) {
        return view('pages.contact');
      }
      // Store Contact Form data
      public function ContactUsForm(Request $request) {
          // Form validation
          $this->validate($request, [
              'nom' => 'required',
              'email' => 'required|email',
              'numero' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
              'sujet'=>'required',
              'message' => 'required'
           ]);
          //  Store data in database
          Contact::create($request->all());
          //  Send mail to admin
        \Mail::send('mail', array(
            'nom' => $request->get('nom'),
            'email' => $request->get('email'),
            'numero' => $request->get('numero'),
            'sujet' => $request->get('sujet'),
            'user_query' => $request->get('message'),
        ), function($message) use ($request){
            $message->from($request->email);
            $message->to('ounoid@gmail.com', 'Admin')->subject($request->get('sujet'));
        });
          return back()->with('success', 'We have received your message and would like to thank you for writing to us.');
      }
}
