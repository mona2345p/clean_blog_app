<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class sitecontroller extends Controller
{
    public function home(){
        $posts=post::with('user')->take(10)->get();

        return view('front.home',[
            'posts'  =>$posts
        ]);
    }
}
