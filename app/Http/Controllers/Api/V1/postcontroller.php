<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class postcontroller extends Controller
{
    public function index(){
        return response()->json(post::paginate());
    }
}
