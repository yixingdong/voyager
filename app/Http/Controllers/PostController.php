<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(10);
        return view('coding.posts',compact('posts'));
    }

    public function show(Post $post)
    {
        return view('coding.post',compact('post'));
    }
}
