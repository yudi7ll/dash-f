<?php

namespace App\Http\Controllers;

use App\Post;
use Conner\Tagging\Model\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::orderByDesc('count')->get();

        return view('tags.show', compact('tags'));
    }

    public function posts($tags)
    {
        $posts = Post::withAllTags($tags)
            ->with('user')
            ->with('tagged')
            ->where('published', true)
            ->paginate(8);

        return view('tags.posts', compact('tags'))
            ->nest('postcard', 'components.postcard', compact('posts'));
    }
}
