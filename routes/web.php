<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

Route::get("/", [ MainController::class, 'homepage' ])
    ->name('homepage');

Route::get("character/{id}", [ MainController::class, 'characterPage' ])
    ->name('character-page');

Route::get("houses", [ MainController::class, 'houses' ])
    ->name('houses');

Route::get("house/{id}", [ MainController::class, 'house' ])
    ->name('house');
