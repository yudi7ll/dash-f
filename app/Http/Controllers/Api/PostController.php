<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use App\User;

class PostController extends Controller
{
    /**
     * The post model instances
     *
     * @var \App\Model
     */
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Display all Posts data
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function index()
    {
        $sort = request()->sort ?: 'created_at';
        $posts = $this->post
                    ->with('user')
                    ->with('tagged')
                    ->withCount('comments')
                    ->withCount('likes')
                    ->orderByDesc($sort)
                    ->where('published', true)
                    ->paginate(8);

        return view('components.postcard', compact('posts'));
    }

    /**
     * Display all user posts data
     *
     * @param \App\User $user
     * @return \Illuminate\Support\Facades\View
     */
    public function userPosts(User $user)
    {
        $this->post = $user->posts();

        return $this->index();
    }
}
