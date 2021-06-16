<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(3)->create()
            ->each(function ($category) {
                $category->children()->saveMany(Category::factory(rand(5, 10))->make());
            });
    }
}
