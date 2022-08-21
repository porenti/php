<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/*
VIEWS.PY
*/
//
Route::redirect('/', 'users')->name('main');

Route::get('/home', function () {
    return view('home');
});

Route::get('/primer', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

<<<<<<< Updated upstream
    Route::post('users/{user}/roles-update', [UsersController::class, 'rolesUpdate'])->name('users.roles-update');

    Route::get('users/{user}/roles-edit', [UsersController::class, 'rolesEdit'])->name('users.roles-edit');

    Route::get('users/{user}/swap-password', [UsersController::class, 'swapPasswordPage'])->name('users.swapPasswordPage');
=======
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);

    Route::middleware('role:admin|moder')->group(function () {
>>>>>>> Stashed changes

    Route::post('users/{user}/updatePassword', [UsersController::class, 'updatePassword'])->name('users.updatePassword');


    Route::resource('users', UsersController::class);

    Route::get('/roles-perm', [RoleController::class, 'chekRolePermission'])->name('roles-perm');

    Route::post('/roles-update-perm/{role}', [RoleController::class, 'updatePerm'])->name('roles-update-perm');
    Route::get('/roles', [RoleController::class, 'index'])->name('roles');
    Route::resource('roles', RoleController::class);

});


<<<<<<< Updated upstream
//ладно тут я запутался
Route::post('/hide/{id}', [UsersController::class, 'hide'])->name('users.hide');
=======

Route::post('users/{user}/roles-update', [UsersController::class, 'rolesUpdate'])->name('users.roles-update');

Route::get('users/{user}/roles-edit', [UsersController::class, 'rolesEdit'])->name('users.roles-edit');
Route::post('/hide/{user}', [UsersController::class, 'hide'])->name('users.hide');
>>>>>>> Stashed changes

Route::get('/search/', [UsersController::class, 'search'])->name('users.search');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
