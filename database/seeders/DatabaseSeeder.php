<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create(['email' => 't@test.com', 'password' => bcrypt('12345678')]);
        \App\Models\User::factory(4)->create();
        \App\Models\Category::factory(5)->create();
        \App\Models\Post::factory(10)->create();
        \App\Models\Comment::factory(5)->create();
    }
}
