<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;

//use Illuminate\Http\Requests\ContactFormRequest;
use App\Contact;
use Mail;

class ContactController extends Controller
{
    public function index()
    {

        return view('contact.index');
    }

    /** * Show the application dashboard. * * @return \Illuminate\Http\Response */
    public function contactPost(Request $request)
    {
        $this->validate($request, [ 'name' => 'required', 'email' => 'required|email', 'message' => 'required' ]);
        Contact::create($request->all());

        Mail::send('email',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'message' => $request->get('message')
            ), function($message)
            {
                $message->from('kalungipatricia66@gmail.com');
                $message->to('kalungicaccra@gmail.com', 'Admin')->subject('contact');
            });

        return back()->with('success', 'Thanks for contacting us!');
    }
    /*public function store(Request $request)

    {
        return \Redirect::route('contact')
            ->with('message', 'Thanks for contacting us!');


    }*/

    /*public function create()
    {
       return view('contact.index');
    }

    public function store(ContactFormRequest $request)
        
    {
        return \Redirect::route('contact')
            ->with('message', 'Thanks for contacting us!');


    }*/

}
