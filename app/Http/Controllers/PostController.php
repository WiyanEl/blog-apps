<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('blog', [
            "title" => "Blog",
            "posts" => Post::all()
        ]);
    }

    public function view(Post $post) 
    {
        return view('post', [
            "title" => "Singe Post",
            "post" => $post
        ]);
    }
}
