<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
        $this->authorizeResource(Comment::class, 'comment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        $comment = new Comment;
        $comment->post_id = $request->post_id;
        $comment->user_id = $request->user_id;
        $comment->content = $request->content;
        $comment->saveOrFail();

        return redirect()->back()->with('success', 'Comment posted successfully!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(CommentRequest $request, Comment $comment)
    {
        $this->authorize('update', $comment);

        $isUpdated = $comment->update($request->all());

        if (! $isUpdated) {
            return redirect()->back()->with('error', 'Update comment failed, Please try again later!');
        }

        return redirect()->back()->with('success', 'Comment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back()->with('success', 'Your comment deleted successfully!');
    }
}
