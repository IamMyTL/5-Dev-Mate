<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

//Routes pour la redirection vers la page d'accueil
Route::get('/', function () {
    return view('/home');
});

Route::get('/home', function () {
    return view('/home');
});
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

//Routes pour la gestion de l'authentification
Auth::routes();

//Routes pour la modification du mot de passe
Route::get('/auth/passwords/edit', [App\Http\Controllers\PasswordController::class, 'edit']);
Route::post('/auth/passwords/update', [App\Http\Controllers\PasswordController::class, 'update']);

//Route pour la place de marché
Route::get('/market', [App\Http\Controllers\MarketController::class, 'index'])->middleware('auth');

//Routes pour la gestion administrateur
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->middleware('admin');
Route::get('/admin/profiles', [App\Http\Controllers\AdminController::class, 'profiles'])->middleware('admin');
Route::get('/admin/profiles/{id}', [App\Http\Controllers\AdminController::class, 'user'])->middleware('admin');
Route::get('/admin/ads', [App\Http\Controllers\AdminController::class, 'ads'])->middleware('admin');
Route::get('/admin/skill/profiles/{id}', [App\Http\Controllers\AdminController::class, 'usersfromskill'])->middleware('admin');
Route::get('/admin/skills', [App\Http\Controllers\AdminController::class, 'skills'])->middleware('admin');
Route::get('/admin/skill/delete/{id}', [App\Http\Controllers\AdminController::class, 'deleteskill'])->middleware('admin');
Route::get('/admin/skill/create', [App\Http\Controllers\AdminController::class, 'addskill'])->middleware('admin');
Route::post('/admin/skill/store', [App\Http\Controllers\AdminController::class, 'storeskill'])->middleware('admin');
Route::get('/admin/skill/edit/{id}', [App\Http\Controllers\AdminController::class, 'editskill'])->middleware('admin');
Route::put('/admin/skill/update/{id}', [App\Http\Controllers\AdminController::class, 'updateskill'])->middleware('admin');


//Routes pour la gestion des annonces
Route::get('/ads/list/{id}', [App\Http\Controllers\AdsController::class, 'index'])->middleware('auth');
Route::get('/ads/one/{id}', [App\Http\Controllers\AdsController::class, 'show'])->middleware('auth');
Route::get('ads/create', [App\Http\Controllers\AdsController::class, 'create'])->middleware('auth');
Route::post('/ads/store', [App\Http\Controllers\AdsController::class, 'store'])->middleware('auth');
Route::put('/ads/update/{id}', [App\Http\Controllers\AdsController::class, 'update'])->middleware('auth');
Route::get('/ads/edit/{id}', [App\Http\Controllers\AdsController::class, 'edit'])->middleware('auth');
Route::get('/ads/delete/{id}', [App\Http\Controllers\AdsController::class, 'delete'])->middleware('auth');

//Routes pour la gestion des profils
Route::get('/profiles/one/{id}', [App\Http\Controllers\ProfileController::class, 'show'])->middleware('auth');
Route::get('/profiles/edit/{id}', [App\Http\Controllers\ProfileController::class, 'edit'])->middleware('auth');
Route::put('/profiles/update/{id}', [App\Http\Controllers\ProfileController::class, 'update'])->middleware('auth');
Route::get('/profiles/delete/{id}', [App\Http\Controllers\ProfileController::class, 'delete'])->middleware('auth');

//Routes pour la gestion des fichiers
Route::get('storage/{file}', function ($file) {
    $path = storage_path('app' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $file);
    return response()->file($path);
});

Route::get('images/{file}', function ($file) {
    $path = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $file);
    return response()->file($path);
});

Route::get('storage/cv/{file}', function ($file) {
    $path = storage_path('app' . DIRECTORY_SEPARATOR . 'cvs' . DIRECTORY_SEPARATOR . $file);
    return response()->file($path);
});

Route::get('deleteCv/{file}/{id}', [App\Http\Controllers\ProfileController::class, 'deleteCv']);


//Route pour la gestion de l'URL
Route::any('{query}',
    function() { return redirect('/home'); })
    ->where('query', '.*');

