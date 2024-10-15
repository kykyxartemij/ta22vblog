<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(Request $request){
        $posts = Post::simplePaginate(16);
        return view('welcome', compact('posts'));
    }
}
