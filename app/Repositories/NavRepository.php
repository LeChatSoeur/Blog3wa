<?php


namespace App\Repositories;


use App\Models\Blog\Dashboard\Slug;

class NavRepository implements NavsRepositoryInterface
{

    public function navSlug()
    {

        return Slug::select('id', 'slug', 'nameNav', 'orderNav_id')
            ->where('child_id', 2)
            ->whereNotNull('orderNav_id')
            ->orderBy('orderNav_id', 'asc')->get();
    }


    public function listArticles()
    {
        return Slug::select('id', 'slug', 'nameNav', 'orderNav_id')->where('child_id', 10)->get();
    }


    public function orderNav()
    {
        return Slug::select('id', 'slug', 'nameNav', 'orderNav_id')
            ->where('child_id', 2)
            ->whereNotNull('orderNav_id')
            ->orderBy('orderNav_id', 'asc')->get();
    }


    public function slugsNav()
    {
        return Slug::select('id', 'slug', 'nameNav', 'orderNav_id')
            ->where('child_id', 2)
            ->orderBy('orderNav_id', 'asc')->get();

    }



}
