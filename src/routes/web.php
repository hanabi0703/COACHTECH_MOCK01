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



// Route::post('/login', [AuthController::class, 'login']);

Route::get('/item/{id}', [ProductController::class, 'productDetail'])->name('product.detail');
Route::middleware('auth')->group(function () {
Route::post('/purchase/{id}', [ProductController::class, 'purchase'])->name('product.purchase');
});
Route::middleware('auth')->group(function () {
Route::get('/purchase/address/{id}', [ProductController::class, 'editAddress'])->name('purchase.address');
});
Route::middleware('auth')->group(function () {
Route::post('/purchase/updateAddress/{id}', [ProductController::class, 'updateAddress'])->name('purchase.updateAddress');
});
Route::middleware('auth')->group(function () {
Route::post('/buy', [ProductController::class, 'buy']);
});
Route::middleware('auth')->group(function () {
Route::get('/sell', [ProductController::class, 'sell']);
});
Route::middleware('auth')->group(function () {
Route::post('/sell', [ProductController::class, 'addProduct']);
});

// Route::post('/product/comment', [ProductController::class, 'addComment'])->name('product.comment');
Route::middleware('auth')->group(function () {
Route::post('/product/{id}/like', [ProductController::class, 'like'])->name('product.like');
});
Route::middleware('auth')->group(function () {
Route::post('/product/{id}/comment', [ProductController::class, 'comment'])->name('product.comment');
});
Route::middleware('auth')->group(function () {
Route::get('/mypage', [ProfileController::class, 'mypage']);
});
Route::middleware('auth')->group(function () {
Route::get('/mypage/profile', [ProfileController::class, 'profile']);
});
Route::middleware('auth')->group(function () {
Route::post('/mypage/profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
});
Route::middleware('auth')->group(function () {
Route::get('/mypage/profile/register', [ProfileController::class, 'registerProfile']);
});