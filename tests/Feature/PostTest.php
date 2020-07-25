<?php

namespace Tests\Feature;

use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class PostTest extends TestCase
{
    public function test_user_should_be_able_to_visit_create_post_form()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('post/create');

        $response
            ->assertSuccessful()
            ->assertSee('Title');
    }

    public function test_homepage_should_show_latest_posts_first()
    {
         factory(Post::class, 20)->create();
         $post = collect(Post::latest()->where('published', true)->paginate(10))
             ->pluck('title')
             ->toArray();

         $response = $this->get('/');

         $response
             ->assertSuccessful()
             ->assertSeeInOrder($post);
    }

    public function test_should_be_able_to_see_post_that_has_been_published()
    {
        $post = factory(Post::class)->create();

        $response = $this->get("/post/{$post->slug}");

        $response
            ->assertSuccessful()
            ->assertSeeText($post->title)
            ->assertSeeText($post->description);
        $this->assertDatabaseHas('posts', $post->only('slug'));
    }

    public function test_guest_should_not_be_able_to_see_post_if_not_published()
    {
        $post = factory(Post::class)->create(['published' => false]);
        Auth::logout();

        $response = $this->get("/post/{$post->slug}");

        $response
            ->assertRedirect('/');
    }
}
