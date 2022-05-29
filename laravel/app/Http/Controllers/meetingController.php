<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Meeting;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class meetingController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index(User $user = null)
    {
        return view('map', compact(['meetings', 'user']));
    }

    /**
     * Display a listing of the resource.
     *
     *
     */
    public function show_all(User $user = null)
    {
        $meetings = Film::withTrashed()->get();
        $pins = [];
        echo json_encode($pins);
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
//    public function create()
//    {
//        if (!Auth::check()) {
//            abort(401, "Authentication required");
//        }
//        return view('create');
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request

     */
//    public function store(Request $requ, FilmRequest $req)
//    {
//        if (!Auth::check()) {
//            abort(401, "Authentication required");
//        }
//
//        $film = new Film();
//        $film->title = $req->input('title');
//        $film->genre = $req->input('genre');
//        $film->description = $req->input('description');
//        $film->producer = $req->input('producer');
//        $film->date_of_public = $req->input('date_of_public');
//        $path = $requ->file('image_url')->store('img_load', 'public');
//        $film->image_url = '/storage/' . $path;
//        $film->save();
//        return redirect()->route('index')->with('success', 'Операция успешно выполнилась');
//
//    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     */
//    public function show($id)
//    {
//        $film = Film::query()->findOrFail($id);
//        return view('show', compact('film'));
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     */
//    public function edit($id)
//    {
//        $film = Film::query()->findOrFail($id);
//
//        if (! Gate::allows('modify-object', $film)) {
//            abort(403, "Unauthorized");
//        }
//
//        return view('edit',compact('film'));
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
//    public function update( $id,FilmRequest $req)
//    {
//        $film = Film::query()->findOrFail($id);
//
//        if (! Gate::allows('modify-object', $film)) {
//            abort(403, "Unauthorized");
//        }
//
//        $film->title = $req->input('title');
//        $film->genre = $req->input('genre');
//        $film->description = $req->input('description');
//        $film->producer = $req->input('producer');
//        if (!($req->input('data_of_public') == null)){
//            $film->data_of_public = $req->input('data_of_public');
//        }
//
//        if (\request()->file('image_url')!==Null){
//            $path = \request()->file('image_url')->getClientOriginalName();
//            \request()->file('image_url')->storeAs('img_load',$path,'public');
//            $film['image_url'] = '/storage/img_load/' . $path;
//        }
//
//        $film->save();
//        return redirect()->route('index')->with('success', 'Данные обновлены');
//
//    }

//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int $id
//     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
//     */
//    public function destroy($id)
//    {
//        $film = Film::query()->findOrFail($id);
//
//        if($film!=null){
//            $film->delete();
//            return redirect()->route('index')->with('success', 'Удалено!');
//        }
//        return redirect()->back();
//    }
//
//
//    /**
//     * Remove the specified resource from storage(forever).
//     *
//     * @return \Illuminate\Http\RedirectResponse
//     */
//    public function purge(Request $request, int $id) {
//        if (!Auth::user()->is_admin) {
//            abort(403, "Unauthorized");
//        }
//        Film::withTrashed()->find($id)
//            ->forceDelete();
//
//        return redirect($request['return_url'])
//            ->with('success', 'Объект удален.');
//    }
//
//    /**
//     * Restore the specified resource to storage.
//     *
//     * @return \Illuminate\Http\RedirectResponse
//     */
//    public function  restore(Request $request, int $id){
//        if (!Auth::user()->is_admin) {
//            abort(403, "Unauthorized");
//        }
//
//        Film::withTrashed()->find($id)
//            ->restore();
//
//        return redirect($request['return_url'])
//            ->with('success', 'Объект востановлен.');
//    }
}
