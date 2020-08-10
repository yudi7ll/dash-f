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
    public function deleteOrStore(Request $request, Post $post)
    {
        $data = $request->validate([
            'user_id' => 'integer|required',
        ]);
        $userId = $data['user_id'];
        $isLiked = $post->likes()->where('user_id', $userId)->exists();

        if ($isLiked) {
            $post
                ->likes()
                ->where('user_id', $userId)
                ->delete();
        } else {
            $post->likes()->insert([
                'user_id'=> $userId,
                'post_id' => $post->id
            ]);
        }

        $resp = [
            'likes_count' => $post->likes->count(),
            'is_liked' => $post->likes()->where('user_id', $userId)->exists(),
        ];

        return response()->json($resp, 200);
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
