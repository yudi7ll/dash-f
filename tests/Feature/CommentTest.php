<?php

namespace Tests\Feature;

use App\Post;
use Tests\TestCase;

class CommentTest extends TestCase
{
    public function test_guest_should_be_able_to_see_any_comments()
    {
        $post = Post::first();

        if (! $post) {
            $post = factory(Post::class)->create();
        }

        if ($post->comments()->doesntExist()) {
            $post->comments()->insert([
                'user_id' => 1,
                'post_id' => $post->id
            ]);
        }

        $response = $this->get("/posts/{$post->slug}");

        $response
            ->assertSuccessful()
            ->assertSeeText($post->likes->count())
            ->assertSeeText($post->comments->first()->content);
    }
}
