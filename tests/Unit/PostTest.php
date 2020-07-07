<?php

namespace Tests\Unit;

use App\Post;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use PHPUnit\Framework\TestCase;

class PostTest extends TestCase
{
    use DatabaseMigrations;

    public function test_homepage_should_show_latest_posts_first()
    {
        $user = factory(User::class)->create();
        factory(Post::class, 20)->create(['user_id' => $user->id]);
    }
}
