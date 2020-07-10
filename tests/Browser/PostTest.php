<?php

namespace Tests\Browser;

use App\Post;
use App\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PostTest extends DuskTestCase
{
    public function test_user_should_be_able_to_create_a_new_post()
    {
        $this->browse(function (Browser $browser) {
            if (!User::all()->count()) {
                factory(User::class)->create();
            }

            $post = factory(Post::class)->make();

            $browser->loginAs(User::all()->first())
                    ->visit('/post/create')
                    ->assertRouteIs('post.create')
                    ->assertSee('Published')
                    ->type('title', $post->title)
                    ->type('description', $post->description)
                    ->type('cover', $post->cover)
                    ->check('#published')
                    ->press('Submit')
                    ->waitForRoute('home')
                    ->assertRouteIs('home')
                    ->assertSee($post->title);
        });
    }

    public function test_infinite_scrolling()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->scrollTo('#loading')
                    ->assertDontSee('No more data.');
        });
    }
}
