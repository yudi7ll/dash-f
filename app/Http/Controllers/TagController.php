<?php

namespace App\Http\Controllers;

use App\Post;
use Conner\Tagging\Model\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();

        return view('tags', compact('tags'));
    }

    public function posts($tag)
    {
        $posts = Post::withAnyTag($tag)
            ->with('user')
            ->with('tagged')
            ->where('published', true)
            ->paginate(8);

        return view('post.tags')
            ->nest('postcard', 'components.postcard', compact('posts'));
    }
}
