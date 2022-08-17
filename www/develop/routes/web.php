<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

/*
VIEWS.PY
*/
//
Route::redirect('/', 'users')->name('main');

Route::get('/home', function () {
    return view('home');
});


Route::middleware('auth')->group(function () {

    Route::post('users/{user}/roles-update', [UsersController::class, 'rolesUpdate'])->name('users.roles-update');

    Route::get('users/{user}/roles-edit', [UsersController::class, 'rolesEdit'])->name('users.roles-edit');


    Route::resource('users', UsersController::class);

    Route::get('/roles-perm', [RoleController::class, 'chekRolePermission'])->name('roles-perm');

    Route::post('/roles-update-perm/{role}', [RoleController::class, 'updatePerm'])->name('roles-update-perm');
    Route::get('/roles', [RoleController::class, 'index'])->name('roles');
    Route::resource('roles', RoleController::class);

});


//ладно тут я запутался
Route::post('/hide/{id}', [UsersController::class, 'hide'])->name('users.hide');

Route::get('/search/', [UsersController::class, 'search'])->name('users.search');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
