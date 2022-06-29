<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        return view('admin.news');
    }

    // public function edit(){
    //     return view('admin.news-edit');
    // }

    public function edit($id){
        return view('admin.news-edit', compact('id'));
    }
}
