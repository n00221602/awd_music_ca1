<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Song;

//Resource controllers include CRUD, which will be used with our resource (Song).

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('user');

        return view('user.songs.index')->with('songs', $songs);

    }

    /**
     * Shows a specific song
     */
    public function show(Song $song)
    {
        $user = Auth::user();
        $user->authorizeRoles('user');

        //'return' displays the view 'songs.show'
        //'with()' passes $song to the view.
        return view('user.songs.show')->with('song', $song);
    }

}
