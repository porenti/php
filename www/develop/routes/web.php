<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
VIEWS.PY
*/
//
Route::redirect('/',"list/1");

Route::get('/fq', function () {
    return view('fq'); //чо ваще можно сделать чтоб интересно бьыло...
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/fq/{id}', function ($id) {
    return "id: ".$id; //
});

Route::resource('list/users', UsersController::class);
Route::get('list/{page}', [UsersController::class, 'index']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
