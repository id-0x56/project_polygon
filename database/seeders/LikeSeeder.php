<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::inRandomOrder()->limit(round(Post::count() / rand(3, 5)))->get()
            ->each(function (Post $post) {
                User::inRandomOrder()->limit(round(User::count() / rand(1, 3)))->get()
                    ->each(function (User $user) use (&$post) {
                        $post->likes()->saveMany(Like::factory(1)->make([
                            'user_id' => $user->id,
                        ]));
                    });
            });

        Category::inRandomOrder()->limit(round(Category::count() / rand(3, 5)))->get()
            ->each(function (Category $category) {
                User::inRandomOrder()->limit(round(User::count() / rand(1, 3)))->get()
                    ->each(function (User $user) use (&$category) {
                        $category->likes()->saveMany(Like::factory(1)->make([
                            'user_id' => $user->id,
                        ]));
                    });
            });
    }
}
