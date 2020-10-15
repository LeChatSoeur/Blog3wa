<?php

namespace Database\Seeders;

use App\Models\Blog\Category\Category_pays;
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
        $category_France = new Category_pays();
        $category_France->title ="France";
        $category_France->save();

        $category_Canada = new Category_pays();
        $category_Canada->title ="Canada";
        $category_Canada->save();
    }
}
