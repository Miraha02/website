<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\SerieController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;

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

Route::get('/', [SerieController::class, 'index']);


Route::resource('user', UserController::class);

Route::resource('serie', SerieController::class);

Route::resource('comment', CommentController::class);

Route::get('Accueil',function (){
    return view('/layouts/app');
});

//Route::post("/login", );

Route::fallback(function (){
    echo "Page Introuvable <3";
});
