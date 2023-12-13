<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Artist;
use Illuminate\Support\Facades\Auth;

class ArtistController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //only the admin role is authorised to use this function
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $artists = Artist::all();
        //$artists = Artist::paginate(10);
        // $artists = Artist::with('song')->get();

        return view('admin.artists.index')->with('artists', $artists);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $artists = Artist::all();
        return view('admin.labels.create')->with('artists',$artists);
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
            'name' => 'required|max:50',
            'monthly_listeners' => 'required|max:100000000',
            'debut' => 'required|max:2023',
        ]);

        if ($request->hasFile ('song_image')) {
            $image = $request->file('song_image');
            $imageName = time() . '.' . $image->extension();
            // store image file into public disk under songs directory
            $image->storeAs('public/songs', $imageName);
            $song_image_name = 'storage/songs/' . $imageName;
        }

        //title is pulled from the request,
        //everything else is hardcoded at the moment
        Artist::create([
            'name' => 'required|max:50',
            'monthly_listeners' => 'required|max:100000000',
            'debut' => 'required|max:2023',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return to_route('admin.artists.index')->with('success', 'Artist created successfully');  //returns to the index page with a success message
    }

    /**
     * Display the specified resource.
     */
    public function show(Artist $artist)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        if (!Auth::id()) {
            return abort(403);
        }

        //Retrieves songs for the artist
        $songs = $artist->songs;

        return view('admin.artists.show', compact('artist', 'songs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artist $artist)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $songs = Song::all();
        return view('admin.artists.edit')->with('songs',$songs);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artist $artist)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        //validator
        $request->validate([
            'name' => 'required|max:50',
            'monthly_listeners' => 'required|max:100000000',
            'debut' => 'required|max:2023',
        ]);

        if ($request->hasFile ('song_image')) {
            $image = $request->file('song_image');
            $imageName = time() . '.' . $image->extension();
            // store image file into public disk under songs directory
            $image->storeAs('public/songs', $imageName);
            $song_image_name = 'storage/songs/' . $imageName;
        }

        //title is pulled from the request,
        //everything else is hardcoded at the moment
        $artist->update([
            'name' => 'required|max:50',
            'monthly_listeners' => 'required|max:100000000',
            'debut' => 'required|max:2023',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return to_route('admin.artists.show')->with('success', 'Artist created successfully');  //returns to the show page with a success message
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artist $artist)
    {

        $user = Auth::user();
        $user->authorizeRoles('admin');

        $artist->delete();
        return to_route('admin.artists.index', $artist)->with('success', 'Artist deleted successfully'); // routes to index view with a success message
    }
}
