<?php

namespace App\Http\Controllers\Blog\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Blog\Dashboard\Category\Category_province;
use App\Models\Blog\Dashboard\Category\Category_region;
use App\Models\Blog\Tag;
use App\Repositories\DynamicPagesRepositoryInterface;
use Illuminate\Http\Request;

class CategoryAjaxController extends Controller
{
    public function categoryAjaxRegions(Request $request)
    {

        $categoryRegion = Category_region::where('pays_id', $request->id)->get();
        return $categoryRegion->toJson();
    }

    public function categoryAjaxProvinces(Request $request)
    {
        $categoryProvince = Category_province::where('region_id', $request->id)->get();
        return $categoryProvince->toJson();
    }

    public function categoryAjaxTags(request $request)
    {

        $data = $request->validate([

            'tags' => 'nullable',
            ]);

        if (!empty($data)) {
            $tag = new Tag();
            $tag->name    = $data['tags'];
            $tag->slug    = $data['tags'];
            $tag->save();

            }
}

    public function saveAjaxPageDynamic(request $request, DynamicPagesRepositoryInterface $DynamicPageRepository)
    {
        //dd($request);
        $content = $DynamicPageRepository->PrepareAjaxContent($request);
        $image = $DynamicPageRepository->UploadAjaxImage($request);

        $data = [$content, $image];
        $save = $DynamicPageRepository->saveAjaxPageDynamic($data);
// ici j'ai la largeur du content, s'il y a un header et s'il y a une image


        return response()->json([$content, $image]);
    }




}



