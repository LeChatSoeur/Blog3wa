<?php


namespace App\Repositories;


use App\Models\Blog\Dashboard\Category\Category_province;
use App\Models\Blog\Dashboard\Category\Category_region;
use App\Models\Blog\Dashboard\Slug;
use App\Models\Blog\Tag;

class AjaxRepository implements AjaxRepositoryInterface
{

    public function ajaxRegions($request)
    {

        return Category_region::where('pays_id', $request->id)->get();
    }


    public function ajaxProvinces($request)
    {

        return Category_province::where('region_id', $request->id)->get();
    }

    public function uploadAjaxImage($request)
    {
        if ($request->hasFile('img')) {

            //get filename with extension
            $filenamewithextension = $request->file('img')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('img')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename . '_' . time() . '.' . $extension;

            //Upload File
            $request->file('img')->move('storage/uploads', $filenametostore);

            return ($filenametostore);
        }
        return false;
    }


    public function ajaxNav($request, $id)
    {
        $data = $request->validate([
            // l'ID du title est ignoré dans la requête pour le titre unique.
            'order' => 'nullable',
        ]);
        $dataSlug = Slug::select('slug','nameNav', 'child_id')->where('id', $id)->first();


        $orderNav_id = $data['order'];
        if($data['order'] === "null")
        {
            $orderNav_id = null;
        }

        if (!empty($data)) {
            $slug = Slug::find($id);
            $slug->slug = $dataSlug->slug;
            $slug->nameNav = $dataSlug->nameNav;
            $slug->orderNav_id = $orderNav_id;
            $slug->child_id = $dataSlug->child_id;
            $slug->save();
            return response()->json($request);
        }
    }

}
