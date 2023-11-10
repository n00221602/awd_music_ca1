<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

//Resource controllers include CRUD, which will be used with our resource (Song).

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //shows an array of songs in index.blade.php
        //array is stored in $songs variable
        //compact() creates an array
        $songs = Song::all();
        return view('songs.index', compact('songs'));

    }

    /**
     * Creates a new song. Shows a form.
     */
    public function create()
    {
        return view('songs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validator
        $request->validate([
            'title' => 'required|max:50',
            'genre' => 'required|max:25',
            'album' => 'required|max:50',
            'release_date' => 'required',
            'length' => 'required',
            'song_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        //creates a unique name for the image file
        if ($request->hasFile ('song_image')) {
            $image = $request->file('song_image');
            $imageName = time() . '.' . $image->extension();
            // store image file into public disk under songs directory
            $image->storeAs('public/songs', $imageName);
            $song_image_name = 'storage/books/' . $imageName;
        }

        //title is pulled from the request,
        //everything else is hardcoded at the moment
        Song::create([
            'title' => $request->title,
            'genre' => $request->genre,
            'album' => $request->album,
            'release_date' => $request->release_date,
            'length' => $request->length,
            'song_image' => $song_image_name,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return to_route('songs.index')->with('success', 'Song created successfully');  //returns to the index page with a success message
    }

    /**
     * Shows a specific song
     */
    public function show(Song $song)
        {
            //'return' displays the view 'songs.show'
            //'with()' passes $song to the view.
            return view('songs.show')->with('song', $song);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Song $song)
    {
        //returns the edit view
        return view('songs.edit')->with('song', $song);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //validator
        $request->validate([
            'song_name' => 'required|max:50',
            'genre' => 'required|max:25',
            'album' => 'required|50',
            'release_date' => 'required',
            'length' => 'required',
            'song_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        //creates a unique name for the image file
        if ($request->hasFile ('song_image')) {
            $image = $request->file('song_image');
            $imageName = time() . '.' . $image->extension();
            // store image file into public disk under songs directory
            $image->storeAs('public/songs', $imageName);
            $song_image_name = 'storage/books/' . $imageName;
        }

        //title is pulled from the request,
        //everything else is hardcoded at the moment
        Song::create([
            'song_name' => $request->title,
            'genre' => $request->genre,
            'album' => $request->album,
            'release_date' => $request->release_date,
            'length' => $request->length,
            'song_image' => $song_image_name,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return to_route('songs.show', $song)->with('success', 'Song updated successfully'); // routes to show view with a success message
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Song $song)
    {
        $song->delete();
        return to_route('songs.index', $song)->with('success', 'Song deleted successfully'); // routes to index view with a success message
    }
}
