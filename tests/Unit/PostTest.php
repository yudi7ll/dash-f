<?php

namespace Tests\Unit;

use App\Post;
use Tests\TestCase;

class PostTest extends TestCase
{
    public function test_posts_should_belongsTo_user()
    {
        if (!Post::all()->count()) {
            factory(Post::class)->create();
        }
        $post = Post::with('user')->first();

        $this->assertArrayHasKey('user', $post);
    }
}
