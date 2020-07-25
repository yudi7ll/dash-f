<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;

class PostController extends Controller
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }
    public function index()
    {
        $posts = $this->post
                    ->with('user')
                    ->with('tagged')
                    ->latest()
                    ->where('published', true)
                    ->paginate(8);

        return view('components.postcard', compact('posts'));
    }

    public function populars()
    {
        $populars = $this->post->all()->take(10);

        return view('components.sidebar', compact('populars'));
    }
}
