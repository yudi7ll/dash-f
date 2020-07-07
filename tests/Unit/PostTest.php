<?php

namespace Tests\Unit;

use App\Post;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class PostTest extends TestCase
{
    use DatabaseMigrations;

    public function test_posts_should_belongsTo_user()
    {
        factory(Post::class)->create();
        $post = Post::with('user')->first();

        $this->assertArrayHasKey('user', $post);
    }
}
