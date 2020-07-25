<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Conner\Tagging\Model\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::limit(8)->orderByDesc('count')->get();

        return view('components.tagscard', compact('tags'));
    }
}
