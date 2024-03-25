<?php

namespace App\Http\Controllers;

use App\Events\test;
use App\Models\contact;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function Index()
    {
     $contact =   contact::create([
            'name' => 'test',
            'email' => 'test',
            'phone' => 'test',
            'message' => 'test',
            'ip_address' => 'test',
        ]);


        return view('welcome');
    }
}
