<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function Index(Request $request){
//        contact::create

        contact::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'message' => $request->get('message'),
            'ip_address' => $request->ip(),
        ]);
        return redirect()->back()->with('message', 'bedankt voor het invullen van het contact formulier');
    }
}
