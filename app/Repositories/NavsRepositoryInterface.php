<?php


namespace App\Repositories;


interface NavsRepositoryInterface
{

    public function navSlug();

    public function listArticles();

    public function orderNav();

    public function slugsNav();
}
