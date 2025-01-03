<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CastController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\ReviewController;

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

Route::get('/', [DashboardController::class, "home"]);
Route::get('/register', [AuthController::class, "register"]);
Route::post('/welcome', [AuthController::class, "welcome"]);

// Route::get('/master', function () {
//     return view('layouts.master');
// });

Route::get('/data-table', function(){
    return view('data-table');
})->middleware('auth');

Route::get('/table', function(){
    return view('table');
})->middleware('auth');


Route::resource('genre', GenreController::class);
Route::resource('film', FilmController::class);
Route::post('/review/{new_id}', [ReviewController::class, 'store']);


Route::get('/cast', [CastController::class, 'index']);
Route::get('/cast/create', [CastController::class, 'create']);
Route::post('/cast', [CastController::class, 'store']);
Route::get('/cast/{cast_id}', [CastController::class, 'show']);
Route::get('/cast/{cast_id}/edit', [CastController::class, 'edit']);
Route::put('/cast/{cast_id}', [CastController::class, 'update']);
Route::delete('/cast/{cast_id}', [CastController::class, 'destroy']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
