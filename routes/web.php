<?php

use App\Http\Controllers\Admin\MessagesController as AdminMessagesController;
use App\Http\Controllers\Admin\QuestionsController as AdminQuestionsController;
use App\Http\Controllers\Admin\ThemesController as AdminThemesController;
use App\Http\Controllers\Admin\UsersController as AdminUsersController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\QuestController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\StatsController;
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

Route::group(['middleware' => 'auth'], function () {
    //for admin
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
        Route::resource('/themes', AdminThemesController::class);
        Route::resource('/users', AdminUsersController::class);
        Route::resource('/questions', AdminQuestionsController::class);
        Route::resource('/messages', AdminMessagesController::class);
    });

    Route::get('admin/questions/addCorrectAnswer/{id}', [AdminQuestionsController::class, 'addCorrectAnswer'])
        ->where('id', '\d+')
        ->name('addCorrectAnswer');

    Route::post('admin/questions/saveCorrectAnswer', [AdminQuestionsController::class, 'saveCorrectAnswer'])
        ->name('saveCorrectAnswer');
});

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

Route::get('completedThemes', [ThemeController::class, 'completedThemes'])
    ->middleware(['auth'])
    ->name('completedThemes');

Route::get('/themes/show/{id}', [ThemeController::class, 'show'])
    ->where('id', '\d+')
    ->name('themes.show');

Route::get('/getQuest/{id}', [QuestController::class, 'getQuest'])
    ->where('id', '\d+')
    ->name('getQuest');

Route::post('getNextQuest/{id}/{questNumber}', [QuestController::class, 'getNextQuest'])
    ->where(['id' => '\d+', 'questNumber' => '\d+'])
    ->name('getNextQuest');

Route::resource('/message', MessageController::class);

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

/* маршрут на страницу статистики: stats */
Route::get('/stats', [StatsController::class, 'stats'])
    ->middleware(['auth'])
    ->name('stats');

/* маршрут на страницу обратной связи */
Route::get('/message', [MessageController::class, 'message'])
    ->middleware(['auth'])
    ->name('message');

Route::get('/', [ThemeController::class, 'randomThemes'])
    ->name('home');
