<?php

namespace App\Http\Controllers;

use App\ModelFilters\MeetingFilter;
use App\Models\Meeting;
use App\Models\tags;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;


class MeetingController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index(User $user = null)
    {
        return view('map', compact(['user']));
    }

    /**
     * Display a listing of the resource.
     *
     *
     */
    public function show_all()
    {
        $meetings =
            Meeting::query()
                ->join('users','owner_id', '=', 'users.id')
                ->whereColumn('participants_have', '<', 'participants_need')
                ->get();

        return response()->json($meetings);
    }
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function filter_show(Request $request)
    {

        if ($request->has('tag_id'))
        {
            $meetings = Meeting::query()->where('tag_id', $request->input('tag_id'))->get();
        }

        if ($request->has('people_count'))
        {
            $meetings = Meeting::query()->where('diff', $request->input('people_count'))->get();
        }
        return response()->json($meetings);
    }

    /**
     * Display a listing of the resource.
     *
     *
     */
    public function show_tags()
    {
        $tags = tags::all();

        return response()->json($tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create(Request $request)
    {
        $meeting = new Meeting();
        $meeting->title = $request->input('title_event');
        $meeting->meeting_time = $request->input('meeting_time');
        $meeting->description = $request->input('description');
        $meeting->tag_id = $request->input('list1');
        $meeting->participants_need = $request->input('countPeople');
        $meeting->participants_have = $request->input('have_count_people');
        $meeting->coordinates = $request->input('coord');
        $meeting->diff = $request->input('countPeople')-$request->input('have_count_people');
        $meeting->owner_id = $request->input('userId');
        $meeting->save();
    }

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $film = Meeting::query()->findOrFail($id);

        if($film!=null){
            $film->delete();
            return redirect()->route('index')->with('success', 'Удалено!');
        }
        return redirect()->back();
    }
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
