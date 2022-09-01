<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Shop\CatalogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Shop\CartController;

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
Route::resource('users', UsersController::class);

Route::middleware('auth')->group(function () {


    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);

    Route::middleware('role:admin|moder')->group(function () {

        Route::post('users/{user}/roles-update', [UsersController::class, 'rolesUpdate'])->name('users.roles-update');

        Route::get('users/{user}/roles-edit', [UsersController::class, 'rolesEdit'])->name('users.roles-edit');

        Route::post('/hide/{user}', [UsersController::class, 'hide'])->name('users.hide');

        Route::get('users/{user}/swap-password', [UsersController::class, 'swapPasswordPage'])->name('users.swapPasswordPage');

        Route::post('users/{user}/updatePassword', [UsersController::class, 'updatePassword'])->name('users.updatePassword');


        Route::get('/roles-perm', [RoleController::class, 'chekRolePermission'])->name('roles-perm');

        Route::post('/roles-update-perm/{role}', [RoleController::class, 'updatePerm'])->name('roles-update-perm');


        Route::get('roles/{role}/permissions', [RoleController::class, 'permissions'])->name('roles.permissions');

        Route::patch('roles/{role}/permissions/update', [RoleController::class, 'permissionsUpdate'])->name('roles.permissions.update');

        Route::resource('roles', RoleController::class);

    });

});

Route::middleware('cart')->group(function () {
// middleware - группировка рутов и выдача им стартового функционала по имени 'cart'
    Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');

    Route::post('edit/', [CartController::class, 'editQuantityCartItem'])->name('shop.cart.edit');
    Route::get('cart/', [CartController::class, 'index'])->name('shop.cart.index');
    Route::patch('update/', [CartController::class, 'addNewItem'])->name('shop.cart.update');
    Route::post('delete/', [CartController::class, 'removeItem'])->name('shop.cart.remove');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
