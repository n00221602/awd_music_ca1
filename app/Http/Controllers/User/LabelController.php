<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Label;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        //$labels = Label::all();
        //$labels = Label::paginate(10);
        $labels = Label::with('song')->get();

        return view('admin.songs.index')->with('labels', $labels);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        return view('admin.songs.show')->with('label',$label);
    }
}
