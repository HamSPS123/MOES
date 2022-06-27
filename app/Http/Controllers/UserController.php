<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('sites.index');
    }

    public function about(){
        return view('sites.about');
    }

    public function news(){
        return view('sites.news');
    }

    public function contact(){
        return view('sites.contact');
    }
}
