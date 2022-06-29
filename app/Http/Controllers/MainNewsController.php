<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainNewsController extends Controller
{
    public function mainnewsIndex(){
        return view('mainnews.index');
    }
}
