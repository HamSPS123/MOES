<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function userUpdate(){
        return view('admin.update-user-profile');
    }

    public function users(){
        return view('admin.users');
    }

    public function news(){
        return view('admin.news');
    }
}
