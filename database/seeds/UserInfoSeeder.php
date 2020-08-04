<?php

use App\User;
use Faker\Generator;
use Illuminate\Database\Seeder;

class UserInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        $ids = User::all()->modelKeys();

        foreach ($ids as $id) {
            $username = User::find($id)->username;
            // try login
            auth()->logout();
            auth()->attempt([
                'username' => $username,
                'password' => 'password',
            ]);

            DB::table('user_infos')->insert([
                'user_id' => $id,
                'bio' => $faker->realText(80),
                'twitter' => "https://twitter.com/{$username}",
                'github' => "https://github.com/{$username}",
                'facebook' => "https://facebook.com/{$username}",
                'work_as' => $faker->jobTitle,
                'work_at' => $faker->city,
                'birth_date' => $faker->date(),
            ]);
        }
    }
}
