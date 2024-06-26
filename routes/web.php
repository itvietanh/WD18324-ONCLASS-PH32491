<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

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

Route::get('/test', function() {
    echo 'Hello World';
});

Route::get('/list-product', [ProductController::class, 'listProduct']);
Route::get('/profile', [ProfileController::class, 'profile']);

//Params
Route::get('update', [ProductController::class, 'updateProduct']);

//Slug
Route::get('/{id}', [ProductController::class, 'findOne']);


Route::get('/', function () {
    return view('welcome');
});
