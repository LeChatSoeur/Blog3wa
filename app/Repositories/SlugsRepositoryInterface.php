<?php


namespace App\Repositories;


interface SlugsRepositoryInterface
{
    public function saveSlug($request, $slug);

    public function deleteSlugPage($slugsNav);

    public function deleteSlugArticle($slugsPost);
}
