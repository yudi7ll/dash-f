<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class PostTest extends TestCase
{
    use DatabaseMigrations;

    private $data = [
        '_token' => "{{ csrf_token() }}",
        'title' => 'Test',
        'description' => 'testing',
        'published' => 'on',
        'body' => '# Hello World',
    ];

    public function test_guest_can_see_posts()
    {
        $response = $this->get('/');

        $response->assertOk();
    }

    public function test_user_should_be_able_to_visit_create_post_form()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('post/create');

        $response
            ->assertOk()
            ->assertSee('Title');
    }
}
