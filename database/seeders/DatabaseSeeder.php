<?php

namespace Database\Seeders;


use App\Models\Blog\Dashboard\Category\Category_pays;
use App\Models\Blog\Dashboard\Category\Category_province;
use App\Models\Blog\Dashboard\Category\Category_region;
use App\Models\Blog\Post;
use App\Models\Blog\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     * @throws \Exception
     */
    public function run()
    {
        $this->call(Category_paysTableSeeder::class);
        $this->call(Category_regionTableSeeder::class);
        $this->call(Category_provinceTableSeeder::class);
        $this->call(SlugTableSeeder::class);

    }
}
