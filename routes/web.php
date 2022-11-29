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


Route::get('/market', [App\Http\Controllers\MarketController::class, 'index']);

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->middleware('admin');

Route::get('/ads/list', [App\Http\Controllers\AdsController::class, 'index']);
Route::get('/ads/one', [App\Http\Controllers\AdsController::class, 'show']);
Route::get('ads/create', [App\Http\Controllers\AdsController::class, 'create']);
Route::post('/ads/store', [App\Http\Controllers\AdsController::class, 'store']);

Route::get('/profiles/one/{id}', [App\Http\Controllers\ProfileController::class, 'show']);
Route::get('/profiles/edit/{id}', [App\Http\Controllers\ProfileController::class, 'edit']);
Route::put('/profiles/update/{id}', [App\Http\Controllers\ProfileController::class, 'update']);
Route::get('/profiles/delete/{id}', [App\Http\Controllers\ProfileController::class, 'delete']);