<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
VIEWS.PY
*/
//
Route::redirect('/',"users");

Route::get('/fq', function () {
    return view('fq'); //чо ваще можно сделать чтоб интересно бьыло...
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/fq/{id}', function ($id) {
    return "id: ".$id; //
});

Route::resource('users', UsersController::class);
