<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class ReadmoreController extends Controller
{
    public $post_id;

    // public function mount($id){
    //     $this->post_id = $id;
    // }

    public function index($id){
        return view('sites.readmore', [
            'post' => News::with('auth')->find($id),
        ]);
    }
}
