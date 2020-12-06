<?php

namespace Database\Seeders;

use App\Models\Blog\Dashboard\Category\Category_pays;
use App\Models\Blog\Post;
use Illuminate\Database\Seeder;

class Category_paysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category_pays();
        $category->title ="France";
        $category->save();

        $category = new Category_pays();
        $category->title ="Canada";
        $category->save();
    }
}
