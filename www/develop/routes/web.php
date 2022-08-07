<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
VIEWS.PY
*/
//
Route::redirect('/',"list/1")->name('main');

Route::get('/home', function () {
    return view('home');
});

Route::resource('list/users', UsersController::class);
Route::get('list/{page}', [UsersController::class, 'index']);
//ладно тут я запутался
Route::post('/hide/{id}', [UsersController::class, 'hide'])->name('users.hide');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
