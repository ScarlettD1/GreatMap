<?php

use App\Http\Controllers\filmController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Route::resource('films', filmController::class);

Route::get('/films', 'App\Http\Controllers\filmController@index')->name('index');
Route::get('/users/{user:name}/feed', [UserController::class, 'feed'])->name('users.feed');

Route::get('/films/create', 'App\Http\Controllers\filmController@create')->name('create');
Route::post('/films', 'App\Http\Controllers\filmController@store')->name('store');
Route::get('/films/{id}', 'App\Http\Controllers\filmController@show')->name('show');
Route::get('/films/{id}/edit', 'App\Http\Controllers\filmController@edit')->name('edit');
Route::post('/films/{id}', 'App\Http\Controllers\filmController@update')->name('update');
Route::delete('/films/{id}', 'App\Http\Controllers\filmController@destroy')->name('destroy');

Route::get('/users/{user:name}/films', [filmController::class, 'index'])->name('users.films');
Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::post('/films/{id}/restore', [filmController::class, 'restore'])->name('films.restore')->middleware(['auth']);
Route::post('/films/{id}/purge', [filmController::class, 'purge'])->name('films.purge')->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/films/{film}/reviews', [ReviewController::class, 'index'])->name('reviews.index');
Route::get('/films/{film}/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
Route::post('/films/{film}/reviews', [ReviewController::class, 'store'])->name('reviews.store');

Route::post('/users/{user:name}/befriend', [UserController::class, 'befriend'])->name('users.befriend');
Route::post('/users/{user:name}/unfriend', [UserController::class, 'unfriend'])->name('users.unfriend');

require __DIR__.'/auth.php';
