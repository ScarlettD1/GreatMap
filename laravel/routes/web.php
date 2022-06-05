<?php

use App\Http\Controllers\MapController;
use App\Http\Controllers\MeetingController;
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
    return view('welcome');
});

Route::get('/map/', function () {
    return view('map');
});
Route::get('/map/', [MapController::class, 'index']);

Route::get('/support/', function () {
    return view('support');
});
Route::get('/entrance/', function () {
    return view('entrance');
});
Route::get('/registration/', function () {
    return view('registration');
});
Route::get('/meetings_pins', [MeetingController::class, 'show_all']);
Route::get('/meetings_pinsFilter', [MeetingController::class, 'filter_show']);
Route::get('/tag_list', [MeetingController::class, 'show_tags']);
Route::post('/create', [MeetingController::class, 'create'])->name('create');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
