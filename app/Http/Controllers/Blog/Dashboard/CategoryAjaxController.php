<?php

namespace App\Http\Controllers\Blog\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\AjaxRepositoryInterface;
use Illuminate\Http\Request;

class CategoryAjaxController extends Controller
{
    public function categoryAjaxRegions(Request $request, AjaxRepositoryInterface $ajaxRepository)
    {
        $ajaxRegions = $ajaxRepository->ajaxRegions($request);
        return $ajaxRegions->toJson();
    }

    public function categoryAjaxProvinces(Request $request, AjaxRepositoryInterface $ajaxRepository)
    {
        $ajaxProvinces = $ajaxRepository->ajaxProvinces($request);
        return $ajaxProvinces->toJson();
    }


    public function saveAjaxImage(request $request, AjaxRepositoryInterface $ajaxRepository)
    {

      $image = $ajaxRepository->uploadAjaxImage($request);
       return response()->json([$image]);
    }


    public function orderAjaxNav(Request $request, $id, AjaxRepositoryInterface $ajaxRepository)
    {
        return $ajaxRepository->ajaxNav($request, $id);

    }
}



