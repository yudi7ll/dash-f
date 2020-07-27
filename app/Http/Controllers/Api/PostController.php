<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;

class PostController extends Controller
{
    /**
     * The post model data
     *
     * @var \App\Model
     */
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Display all Post resources
     *
     * @return \Illuminate\Support\Facades\View
     */
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
}
