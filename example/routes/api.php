<?php

use App\Http\Resources\ReviewResource;
use App\Models\Film;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('films', function() {
    return Film::all();
});

Route::get('films/{id}', function($id) {
    return Film::find($id);
});

Route::post('films', function(Request $request) {
    return Film::create($request->all);
});

Route::put('films/{id}', function(Request $request, $id) {
    $film = Film::findOrFail($id);
    $film->update($request->all());

    return $film;
});

Route::delete('films/{id}', function($id) {
    Film::find($id)->delete();
    return 204;
});


Route::get('reviews', function() {
    return ReviewResource::collection(Review::all());
});

Route::get('reviews/{id}', function($id) {
    return new ReviewResource(Review::find($id));
});

Route::post('reviews', function(Request $request) {
    echo $request->all;
    return Review::create($request->all);
});

Route::put('reviews/{id}', function(Request $request, $id) {
    echo $request->all;
    $article = Review::findOrFail($id);
    $article->update($request->all());

    return $article;
});
