<?php

namespace Tests\Browser;

use App\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    public function test_should_be_able_to_visit_login_form()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('Login');
        });
    }

    public function test_should_be_able_to_login()
    {
        $this->browse(function (Browser $browser) {
            if (!User::all()->count()) {
                factory(User::class)->create();
            }

            $user = User::all()->first();

            $browser->visit('/login')
                    ->type('identity', $user->email)
                    ->type('password', 'password')
                    ->press('Login')
                    ->assertRouteIs('home')
                    ->assertSee($user->name)
                    ->assertAuthenticatedAs($user);
        });
    }
}
