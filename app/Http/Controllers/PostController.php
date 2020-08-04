<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;
use Conner\Tagging\Model\Tag;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web')->except(['index', 'show']);
    }

    /**
     * Post resources that ordered by specified sort
     *
     * @param string $sort
     * @return \App\Post
     */
    public static function postsWithOrder($sort)
    {
        return Post::with('user')
            ->with('tagged')
            ->withCount('comments')
            ->orderByDesc($sort ?: 'created_at')
            ->where('published', true);
    }

    /**
     * Display a initial view with listing of the posts, popular posts & tags.
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function index()
    {
        $sort = request()->sort;
        $posts = self::postsWithOrder($sort)->paginate(8);

        $populars = Post::all()->take(10);
        $tags = Tag::limit(8)->orderByDesc('count')->get();

        return view('home')
            ->nest('postcard', 'components.postcard', compact('posts'))
            ->nest('popular_post', 'components.popular_post', compact('populars'))
            ->nest('tags', 'components.tagscard', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $data = new Post;
        $data->user_id = $request->user_id;
        $data->title = $request->title;
        $data->slug = $request->slug;
        $data->published = $request->published;
        $data->description = $request->description;
        $data->cover = $request->cover;
        $data->body = $request->body;
        $data->saveOrFail();

        $data->tag(explode(',', $request->tags));

        return redirect()
            ->route('posts.show', $data->slug)
            ->with('success', 'Article posted successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Support\Facades\View
     */
    public function show(Post $post)
    {
        if (!$post->published) {

            if (auth()->id() === $post->user_id) {
                return view('posts.show', compact('post'));
            }

            return redirect()->back()->with('error', 'You don\'t have permissions to do this action');
        }

        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Support\Facades\View
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function update(PostRequest $request, Post $post)
    {
        $this->authorize('update', $post);
        // only update the slug if the title changed
        if ($request->title !== $post->title) {
            $post->slug = $request->slug;
        }

        $post->title = $request->title;
        $post->description = $request->description;
        $post->published = $request->published;
        $post->cover = $request->cover;
        $post->body = $request->body;
        $post->saveOrFail();

        $post->retag(explode(',', $request->tags));

        return redirect()
            ->route('posts.show', $post->slug)
            ->with('success', 'Article updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function destroy(Post $post)
    {
        Storage::delete($post->path . $post->body);
        $isDeleted = $post->delete();

        if (! $isDeleted) {
            return redirect()->back()->with('error', 'Something went wrong, please try again later');
        }

        return redirect('/')->with('success', 'Article deleted successfully!');
    }
}
