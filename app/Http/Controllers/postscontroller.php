<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;

class postscontroller extends Controller
{
    public function index(){
        $posts=post::with('user')->paginate(3);
        return view('front.posts.index',compact('posts'));
    }
    public function show(post $post){
     
     
            return view('front.posts.show',compact('post'));
        
    }


}
