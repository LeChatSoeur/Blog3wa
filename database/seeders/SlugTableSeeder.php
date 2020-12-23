<?php


namespace Database\Seeders;


use App\Models\Blog\Dashboard\Slug;
use Illuminate\Database\Seeder;

class SlugTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slug = new Slug();
        $slug->slug ="liste-articles";
        $slug->nameNav = "liste d'articles";
        $slug->orderNav_id = null;
        $slug->child_id = 10;
        $slug->save();

    }
}
