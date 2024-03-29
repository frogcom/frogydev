<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
//Broadcast::channel('player-position', function ($user, $id) {
//    return (int) $user->id === (int) $id;
//});
Broadcast::channel('player-position', function ($user) {
    return 'test'; // Or any other authorization logic
});
