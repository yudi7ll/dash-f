<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class LikeControllers extends Controller
{
    /**
     * Delete if exists or Store if doesn't exists
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    public function deleteOrStore(Post $post)
    {
        $isLiked = $post->likes()->where('user_id', auth()->id())->exists();

        // @STORE if not liked yet
        if (! $isLiked) {
            return $post->likes()->insert([
                'user_id'=> auth()->id(),
                'post_id' => $post->id
            ]);
        }

        // @DELETE if already liked
        return $post->likes()->whereFirst('user_id', auth()->id())->delete();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
