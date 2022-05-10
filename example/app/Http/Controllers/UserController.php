<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact(['users']));
    }

    public function feed(User $user = null)
    {
        if (is_null($user)) {
            abort(404);
        } else {
            $films = [];
            foreach ($user->friends()->get() as $fr) {
                foreach ($fr->films()->get() as $s)
                    array_push($films, $s);
            }
        }

        usort($films, function ($a, $b)
        {
            if ($a->created_at == $b->created_at) {
                return 0;
            }
            return ($a->created_at > $b->created_at) ? -1 : 1;
        });
        $feed = true;
        return view('index', compact(['films', 'user', 'feed']));
    }

    public function befriend(User $user)
    {
        Auth::user()->addFriend($user);
        return redirect()->route('users.index')
            ->with('success', 'Подружен.');
    }

    public function unfriend(User $user)
    {
        Auth::user()->removeFriend($user);
        return redirect()->route('users.index')
            ->with('success', 'Раздружен.');
    }


}
