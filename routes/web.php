<?php

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

Route::get('/ads', [App\Http\Controllers\AdsController::class, 'index']);

Route::get('/market', [App\Http\Controllers\MarketController::class, 'index']);

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index']);

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index']);

Route::post('/ads', [App\Http\Controllers\AdsController::class, 'store']);

