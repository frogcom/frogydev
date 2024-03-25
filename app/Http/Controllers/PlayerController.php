<?php

namespace App\Http\Controllers;

use App\Events\playerPositions;
use Illuminate\Http\Request;

class playerController extends Controller
{
    //

    public function position(Request $request)
    {



        playerPositions::dispatch($request->position);
    }
}
