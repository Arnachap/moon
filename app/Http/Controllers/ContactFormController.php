<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactFormController extends Controller
{
    public function create() {
        return view('contact.create');
    }

    public function store() {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email', 
            'subject' => 'required',
            'message' => 'required'
        ]);
        
        Mail::to('contact@moon-noeudpap.fr')->send(new ContactFormMail($data));

        return redirect('/contact')->with('success', 'Votre message à été envoyé. Nous allons vous recontacter dès que possible.');
    }
}
