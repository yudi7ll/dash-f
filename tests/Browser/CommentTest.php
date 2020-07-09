<?php

namespace Tests\Browser;

use App\Post;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CommentTest extends DuskTestCase
{
    use WithFaker;

    public function test_guest_should_be_able_to_see_comment_form()
    {
        $this->browse(function (Browser $browser) {
            if (!Post::all()->count()) {
                factory(Post::class)->create();
            }

            $post = Post::all()->first();

            $browser->visit("/post/{$post->slug}")
                    ->assertSee($post->title)
                    ->assertSee($post->description);
        });
    }

    public function test_guest_should_not_be_able_to_send_any_comment()
    {
        $this->browse(function (Browser $browser) {
            if (!Post::all()->count()) {
                factory(Post::class)->create();
            }

            $post = Post::all()->first();
            $newComment = $this->faker->sentence;

            $browser->visit("/post/{$post->slug}")
                    ->type('content', $newComment)
                    ->press('Send')
                    ->assertDontSee($newComment)
                    ->assertRouteIs('login')
                    ->assertSee('Login');
        });
    }

    public function test_user_should_be_able_to_send_comment()
    {
        $this->browse(function (Browser $browser) {
            if (!User::all()->count()) {
                factory(User::class)->create();
            }
            if (!Post::all()->count()) {
                factory(Post::class)->create();
            }

            $user = User::all()->first();
            $post = Post::all()->first();
            $newComment = $this->faker->sentence;

            $browser->loginAs($user)
                    ->visit("/post/{$post->slug}")
                    ->type('content', $newComment)
                    ->press('Send')
                    ->assertSeeIn('#comment-list', $newComment)
                    ->logout();
        });
    }
}
