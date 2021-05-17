<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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
        // truncating tables
        User::truncate();
        Post::truncate();
        Category::truncate();

        // creating records
        $user = User::factory()->create();

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);

        $hobbies = Category::create([
            'name' => 'Hobbies',
            'slug' => 'hobbies'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $personal->id,
            'title' => 'My personal post',
            'slug' => 'my-personal-post',
            'excerpt' => 'bla bla bla',
            'body' => 'Lorem ipsum dolor sit amet ametista.'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $work->id,
            'title' => 'My work post',
            'slug' => 'my-work-post',
            'excerpt' => 'bla bla bla 2',
            'body' => 'Lorem ipsum dolor sit amet ametista.'
        ]);
    }
}
