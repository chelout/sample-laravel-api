<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::all()->each(function ($user) {
            factory(App\Post::class, 1000)->create([
                'user_id' => $user->id,
            ]);
        });
    }
}
