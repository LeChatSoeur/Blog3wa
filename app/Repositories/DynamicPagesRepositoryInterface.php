<?php


namespace App\Repositories;


interface DynamicPagesRepositoryInterface
{
    public function save($request, $slug);

    public function saveLayout($request);

    public function loadChoiceContent($slug);

    public function ExplodeChoiceContent($content);

    public function PrepareAjaxContent($request);

    public function UploadAjaxImage($request);

    public function saveAjaxPageDynamic($image, $request);
}
