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
            $user = factory(User::class)->create();
            $post = factory(Post::class)->make();

            $browser->loginAs($user->id)
                    ->visit('/post/create')
                    ->assertRouteIs('post.create')
                    ->assertSee('Published')
                    ->type('title', $post->title)
                    ->type('description', $post->description)
                    ->type('cover', $post->cover)
                    ->check('published')
                    ->press('Submit')
                    ->waitForRoute('home')
                    ->assertRouteIs('home')
                    ->assertSee($post->title);
        });
    }
}
