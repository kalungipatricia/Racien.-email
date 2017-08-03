<?php

namespace App\Http\Controllers;

use Illuminate\Http\Requests\ContactFormRequest;

class ContactController extends Controller
{
    public function create()
    {
        return view('welcome');
    }

    public function store(ContactFormRequest $request)
    {
        return \Redirect::route('welcome')
            ->with('message', 'Thanks for contacting us!');


    }

}
