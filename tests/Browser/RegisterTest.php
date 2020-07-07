<?php

namespace Tests\Browser;

use App\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    public function test_should_be_able_to_visit_register_form()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->assertSee('Register');
        });
    }

    public function test_should_be_able_to_register_an_user()
    {
        $this->browse(function (Browser $browser) {
            $user = factory(User::class)->make();

            $browser->visit('/register')
                    ->type('name', $user->name)
                    ->type('email', $user->email)
                    ->type('password', 'password')
                    ->type('password_confirmation', 'password')
                    ->press('Register')
                    ->assertRouteIs('home')
                    ->assertSee($user->name);
        });
    }
}
