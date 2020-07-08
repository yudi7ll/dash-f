<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    private $post;

    public function __construct(Post $post)
    {
        $this->middleware('auth:web')->except(['index', 'show']);

        $this->post = $post;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = collect(
            $this
                ->post
                ->with('user')
                ->latest()
                ->where('published', true)
                ->paginate(10)
        )->toArray();

        return view('home', compact('posts'));
    }

    /**
     * Display a listing of the owned posts
     *
     * @return \Illuminate\Http\Response
     */
    public function userPost(User $user)
    {
        $posts = collect($user->post()->paginate(10));
        // dd($user->can('view', ));

        return view('home', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
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

        return redirect('/')->with('status', 'Article saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $this->authorize('view', $post);
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, Post $post)
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

        return redirect('/')->with('status', 'Article updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Storage::delete($post->path . $post->body);
        $post->delete();
        return redirect('/')->with('status', 'Article deleted successfully!');
    }
}
