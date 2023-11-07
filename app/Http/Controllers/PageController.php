<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{

    //returns user to the homepage
    public function home()
    {
        return view('home');
    }

    //brings user to the about page
    public function about()
    {
        return view('about');
    }

    //brings user to the contactpage
    public function contact()
    {
        return view('contact');
    }
}
