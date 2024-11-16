<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ProductController::class, 'index']);
// Route::get('/', [ProductController::class, 'index']);

// Route::post('/register', [AuthController::class, 'register']);
Route::middleware('auth')->group(function () {
Route::get('/', [ProductController::class, 'index']);
});


// Route::post('/login', [AuthController::class, 'login']);

Route::get('/item/{id}', [ProductController::class, 'productDetail'])->name('product.detail');
Route::post('/purchase/{id}', [ProductController::class, 'purchase']);
Route::post('/purchase/address/{id}', [ProductController::class, 'updateAddress']);
Route::post('/sell', [ProductController::class, 'sell']);
Route::post('/product/comment', [ProductController::class, 'addComment'])->name('product.comment');
Route::post('/product/{id}/like', [ProductController::class, 'like'])->name('product.like');
Route::post('/product/{id}/comment', [ProductController::class, 'comment'])->name('product.comment');

Route::get('/mypage', [ProductController::class, 'mypage']);
Route::post('/mypage/profile', [ProductController::class, 'profile']);
// Route::get('/', [ProductController::class, 'index']);
// Route::get('/sell', [ProductController::class, 'sell']);

