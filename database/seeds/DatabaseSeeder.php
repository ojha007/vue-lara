<?php

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
//        factory(App\User::class, 50)->create();
//        factory(App\Models\Category::class, 50)->create();
//        factory(App\Models\Question::class, 50)->create();
//        factory(App\Models\Reply::class, 50)->create();
        factory(App\Models\Likes::class, 50)->create();
        // $this->call(UsersTableSeeder::class);
    }
}
