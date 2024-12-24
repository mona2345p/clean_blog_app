<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Homecontroller extends Controller
{
    public function index(){
        echo "Hello from controller";
    }

    public function about(){
        return view('about');
    }

    public function contact(){
        return view('contact');
    }
}
