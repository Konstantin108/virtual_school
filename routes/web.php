<?php

use App\Http\Controllers\QuestController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ThemeController;
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
//Route::view('/', 'home')->name('home');

/* временные маршруты без запроса к контролеру */
Route::view('/stats', 'stats')
    ->middleware(['auth'])
    ->name('stats');

/* тестовый маршрут: dashboard */
Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth'])
    ->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('themes', [ThemeController::class, 'index'])
    ->middleware(['auth'])
    ->name('themes');

Route::get('/themes/show/{id}', [ThemeController::class, 'show'])
    ->where('id', '\d+')
    ->name('themes.show');

Route::get('/getQuest/{id}', [QuestController::class, 'getQuest'])
    ->where('id', '\d+')
    ->name('getQuest');

Route::post('getNextQuest/{id}/{questNumber}', [QuestController::class, 'getNextQuest'])
    ->where(['id' => '\d+', 'questNumber' => '\d+'])
    ->name('getNextQuest');

/* тестовый маршрут для удаления всех данных из сессии */
Route::get('/clearSession', [QuestController::class, 'clearSession'])
    ->name('clearSession');

/* тестовый маршрут для просмотра данных в сессии */
Route::get('/showSession', [QuestController::class, 'showSession'])
    ->name('showSession');

/* сохранение результатов: saveResult */
Route::get('/saveResult', [QuestController::class, 'saveResult'])
    ->name('saveResult');

/* тестовый маршрут для просмотра данных в массиве rating */
Route::get('/showRating', [QuestController::class, 'showRating'])
    ->name('showRating');

/* маршрут на страницу рейтинга: rating */
Route::get('/rating', [RatingController::class, 'rating'])
    ->name('rating');

Route::get('/', [ThemeController::class, 'randomThemes'])
    ->name('home');
