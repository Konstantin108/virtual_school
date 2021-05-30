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
/*
Route::get('/', function () {
    return view('home')->name('home');
});*/
Route::view('/', 'home')->name('home');
/* временные маршруты без запроса к БД */
Route::view('/stats', 'stats')->middleware(['auth'])->name('stats');
Route::view('/rating', 'rating')->name('rating');
/*  */
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
