<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // $posts = Post::query()->with('desc')->paginate(3);
        $posts = Post::query()
                ->where('posts_desc.lang', '=', app()->getLocale())
                ->leftJoin('posts_desc', 'posts.id', '=', 'posts_desc.post_id')
                ->paginate(2);
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
