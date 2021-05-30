<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ThemeController;
use \App\Http\Controllers\QuestController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [ThemeController::class, 'index'])
    ->name('/');

Route::get('/themes/show/{id}', [ThemeController::class, 'show'])
    ->where('id', '\d+')
    ->name('themes.show');

Route::get('/getQuest/{id}', [QuestController::class, 'getQuest'])
    ->where('id', '\d+')
    ->name('getQuest');

Route::get('getNextQuest/{id}/{questNumber}', [QuestController::class, 'getNextQuest'])
    ->where(['id' => '\d+', 'questNumber' => '\d+'] )
    ->name('getNextQuest');

