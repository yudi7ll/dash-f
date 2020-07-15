<?php

namespace Tests\Feature;

use App\Comment;
use App\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use DatabaseMigrations;

    public function test_guest_should_be_able_to_see_any_comments()
    {
        $post = factory(Post::class)->create();
        $comment = factory(Comment::class)->create(['post_id' => $post->id]);

        $response = $this->get("/post/{$post->slug}");

        $response
            ->assertSuccessful()
            ->assertSeeText($comment->content);
    }
}
