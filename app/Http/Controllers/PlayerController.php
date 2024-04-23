<?php

namespace App\Http\Controllers;

use App\Events\playerPositions;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    //

    public function position(Request $request)
    {
        broadcast( new playerPositions($request->get('player')));
    }
}
