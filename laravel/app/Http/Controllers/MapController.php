<?php

namespace App\Http\Controllers;

use App\Models\tags;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        $tags = tags::all();

        return view('map')->with(['tags' => $tags]);
    }
}
