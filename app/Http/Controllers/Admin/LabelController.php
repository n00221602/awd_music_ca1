<?php

namespace App\Http\Controllers\Admin;

use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Label;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //only the admin role is authorised to use this function
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $labels = Label::all();
        //$labels = Label::paginate(10);
        // $labels = Label::with('song')->get();

        return view('admin.labels.index')->with('labels', $labels);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $songs = Song::all();
        return view('admin.labels.create')->with('songs',$songs);
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
            'description' => 'required|max:200',
        ]);

        //title is pulled from the request,
        //everything else is hardcoded at the moment
        Label::create([
            'name' => 'required|max:50',
            'description' => 'required|max:200',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return to_route('admin.labels.index')->with('success', 'Label created successfully');  //returns to the index page with a success message
    }

    /**
     * Display the specified resource.
     */
    public function show(Label $label)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        if (!Auth::id()) {
            return abort(403);
        }

        //Retrieves songs for the label
        $songs = $label->songs;

        return view('admin.labels.show', compact('label', 'songs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Label $label)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $songs = Song::all();
        return view('admin.labels.edit')->with('songs',$songs);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Label $label)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        //validator
        $request->validate([
            'name' => 'required|max:50',
            'description' => 'required|max:200',
        ]);

        //title is pulled from the request,
        //everything else is hardcoded at the moment
        Label::create([
            'name' => 'required|max:50',
            'description' => 'required|max:200',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return to_route('admin.labels.show')->with('success', 'Label created successfully');  //returns to the show page with a success message
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Label $label)
    {

        $user = Auth::user();
        $user->authorizeRoles('admin');

        $label->delete();
        return to_route('admin.labels.index', $label)->with('success', 'Label deleted successfully'); // routes to index view with a success message
    }
}
