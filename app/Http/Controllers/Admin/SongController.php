<?php

namespace App\Http\Controllers\Admin;

use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Label;
use App\Models\Artist;

//Resource controllers include CRUD, which will be used with our resource (Song).

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //only the admin role is authorised to use this function
        $user = Auth::user();
        $user->authorizeRoles('admin');

        //$songs = Song::all();
        //$songs = Song::paginate(10);
        $songs = Song::with('label')->get();

        return view('admin.songs.index')->with('songs', $songs);

    }

    /**
     * Creates a new song. Shows a form.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $labels = Label::all();
        $artists = Artist::all();

        return view('admin.songs.create')->with('labels',$labels)->with('artists', $artists);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        //validator
        $request->validate([
            'title' => 'required|max:50',
            'genre' => 'required|max:25',
            'album' => 'required|max:50',
            'release_date' => 'required',
            'length' => 'required',
            'song_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'label_id' => 'required',
            'artists' =>['required', 'exists:artists,id']
        ]);

        //creates a unique name for the image file
        if ($request->hasFile ('song_image')) {
            $image = $request->file('song_image');
            $imageName = time() . '.' . $image->extension();
            // store image file into public disk under songs directory
            $image->storeAs('public/songs', $imageName);
            $song_image_name = 'storage/songs/' . $imageName;
        }

        //title is pulled from the request,
        //everything else is hardcoded at the moment
        $song = Song::create([
            'title' => $request->title,
            'genre' => $request->genre,
            'album' => $request->album,
            'release_date' => $request->release_date,
            'length' => $request->length,
            'song_image' => $song_image_name,
            'label_id' => $request->label_id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $song->artists()->attach($request->artists);

        return to_route('admin.songs.index')->with('success', 'Song created successfully');  //returns to the index page with a success message
    }

    /**
     * Shows a specific song
     */
    public function show(Song $song)
        {
            $user = Auth::user();
            $user->authorizeRoles('admin');

            //'return' displays the view 'songs.show'
            //'with()' passes $song to the view.
            return view('admin.songs.show')->with('song', $song);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Song $song)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $labels = Label::all();
        return view('admin.songs.edit', compact('song', 'labels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Song $song)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        //validator
        $request->validate([
            'title' => 'required|max:100',
            'genre' => 'required|max:25',
            'album' => 'required|max:50',
            'release_date' => 'required',
            'length' => 'required',
            'song_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'label_id' => 'required',
        ]);

        //creates a unique name for the image file
        if ($request->hasFile ('song_image')) {
            $image = $request->file('song_image');
            $imageName = time() . '.' . $image->extension();
            // store image file into public disk under songs directory
            $image->storeAs('public/songs', $imageName);
            $song_image_name = 'storage/songs/' . $imageName;
        }

        //title is pulled from the request,
        //everything else is hardcoded at the moment
        $song->update([
            'title' => $request->title,
            'genre' => $request->genre,
            'album' => $request->album,
            'release_date' => $request->release_date,
            'length' => $request->length,
            'song_image' => $song_image_name,
            'label_id' => $request->label_id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return to_route('admin.songs.show', $song)->with('success', 'Song updated successfully'); // routes to show view with a success message
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Song $song)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $song->artists()->detach();

        $song->delete();
        return to_route('admin.songs.index', $song)->with('success', 'Song deleted successfully'); // routes to index view with a success message
    }
}
