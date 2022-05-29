<?php

use App\Http\Controllers\MapController;
use App\Http\Controllers\MeetingController;
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
Route::post('/create', [MeetingController::class, 'create'])->name('create');


