<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

Route::get('/auth/passwords/edit', [App\Http\Controllers\PasswordController::class, 'edit']);
Route::post('/auth/passwords/update', [App\Http\Controllers\PasswordController::class, 'update']);


Route::get('/market', [App\Http\Controllers\MarketController::class, 'index'])->middleware('auth');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->middleware('admin');

Route::get('/ads/list/{id}', [App\Http\Controllers\AdsController::class, 'index'])->middleware('auth');
Route::get('/ads/one/{id}', [App\Http\Controllers\AdsController::class, 'show'])->middleware('auth');
Route::get('ads/create', [App\Http\Controllers\AdsController::class, 'create'])->middleware('auth');
Route::post('/ads/store', [App\Http\Controllers\AdsController::class, 'store'])->middleware('auth');
Route::put('/ads/update/{id}', [App\Http\Controllers\AdsController::class, 'update'])->middleware('auth');
Route::get('/ads/edit/{id}', [App\Http\Controllers\AdsController::class, 'edit'])->middleware('auth');
Route::get('/ads/delete/{id}', [App\Http\Controllers\AdsController::class, 'delete'])->middleware('auth');


Route::get('/profiles/one/{id}', [App\Http\Controllers\ProfileController::class, 'show'])->middleware('auth');
Route::get('/profiles/edit/{id}', [App\Http\Controllers\ProfileController::class, 'edit'])->middleware('auth');
Route::put('/profiles/update/{id}', [App\Http\Controllers\ProfileController::class, 'update'])->middleware('auth');
Route::get('/profiles/delete/{id}', [App\Http\Controllers\ProfileController::class, 'delete'])->middleware('auth');

Route::get('storage/{file}', function ($file) {
    $path = storage_path('app' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $file);
    return response()->file($path);
});