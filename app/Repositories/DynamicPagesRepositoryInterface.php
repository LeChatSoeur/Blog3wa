<?php


namespace App\Repositories;


interface DynamicPagesRepositoryInterface
{

    public function loadChoiceContent($slug);

    public function saveChoiceLayout($request);

    public function saveChoiceContent($request);

    public function PrepareHeaderDynamic($slug, $choiceLayout);

    public function prepareContentDynamic($slug, $choiceLayout);

    public function saveStyleDynamic($slug, $string);


}
