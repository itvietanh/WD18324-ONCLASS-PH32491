<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//BASE URL
// const BASE_URL = 'http://127.0.0.1:8000/';



//CRUD => Query Builder
// Route::group([
//     'prefix' => 'users',
//     'as' => 'users.',
// ], function() {
//     Route::get('list-user', [UserController::class, 'listUser'])->name('listUser');
//     Route::get('add', [UserController::class, 'addUser']) -> name('addUser');
//     Route::post('submit-user', [UserController::class, 'handlerSubmitForm']) -> name('submitUser');
//     Route::get('edit-user/{id}', [UserController::class, 'handlerUpdateUser']) -> name('editUser');
//     Route::post('update-user/{id}', [UserController::class, 'handlerUpdate']) -> name('updateUser');
//     Route::get('delete-user/{id}', [UserController::class, 'handlerDeleteUser']) -> name('deleteUser');
// });

// Route::group([
//     'prefix' => 'product',
//     'as' => 'products.',
// ], function() {
//     Route::get('list-product', [ProductController::class, 'getListProduct'])->name('listProduct');
//     Route::get('add-product', [ProductController::class, 'addProduct'])->name('addProduct');
//     Route::post('submit-product', [ProductController::class, 'submitProduct'])->name('submitProduct');
//     Route::get('delete-product/{id}', [ProductController::class, 'handlerDeleteProduct']) -> name('deleteProduct');
//     Route::get('edit-product/{id}', [ProductController::class, 'handlerUpdateProduct']) -> name('editProduct');
//     Route::post('update-product/{id}', [ProductController::class, 'handlerUpdate']) -> name('updateProduct');
// });


//CRUD Eloquent

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::group(['prefix' => 'products', 'as' => 'products.'], function() {
        //CRUD
        Route::get('/', [ProductController::class, 'getListProduct'])->name('listProduct');
        Route::get('add-product', [ProductController::class, 'addProduct'])->name('addProduct');
        Route::post('submit-product', [ProductController::class, 'submitProduct'])->name('submitProduct');
        Route::get('edit-product/{id}', [ProductController::class, 'editProduct'])->name('editProduct');
        Route::patch('edit-product/{id}', [ProductController::class, 'updateProduct'])->name('updateProduct');

        Route::delete('delete-product/{id}', [ProductController::class, 'deleteProduct'])->name('deleteProduct');

    });
});

Route::get('/', function () {
    return view('welcome');
});
