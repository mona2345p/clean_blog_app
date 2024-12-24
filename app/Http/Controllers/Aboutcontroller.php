<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\setting; 

class Aboutcontroller extends Controller
{
    public function index() {
    $site_data=setting::first();
 
        return view('front.about',compact('site_data'));

}
}