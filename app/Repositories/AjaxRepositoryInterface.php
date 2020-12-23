<?php


namespace App\Repositories;



interface AjaxRepositoryInterface
{
    public function ajaxRegions($request);

    public function ajaxProvinces($request);

    public function uploadAjaxImage($request);
}
