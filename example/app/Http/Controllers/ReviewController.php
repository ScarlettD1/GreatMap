<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Film $film)
    {
        if (is_null($film)) {
            $reviews = Review::all();
        } else {
            $reviews = $film->reviews()->get();
        }
        return view('reviews.index', compact(['reviews', 'film']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Film $film)
    {
        if (!Auth::check()) {
            abort(401, "Authentication required");
        }
        return view('reviews.create')->with(compact(['film']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Film $film)
    {
        if (!Auth::check()) {
            abort(401, "Authentication required");
        }
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        if (is_null($film))
            abort(404, "Model not found");

        $data["film_id"] = $film->id;
        $data["user_id"] = Auth::id();
        Review::create($data);
        return redirect()->route('reviews.create', $film)
            ->with('success', 'Объект создан.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
