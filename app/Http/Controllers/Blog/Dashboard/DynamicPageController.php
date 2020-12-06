<?php

namespace App\Http\Controllers\Blog\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Blog\Dashboard\Choice_layout;
use App\Models\Blog\Dashboard\Choicelayout;
use App\Models\Blog\Dashboard\Slug;
use App\Repositories\DynamicPagesRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DynamicPageController extends Controller
{
    public function createSlug()
    {
        return view('Blog\Dashboard\dynamicPage.choiceSlug');
    }



    public function storeSlug(Request $request, DynamicPagesRepositoryInterface $DynamicPageRepository)
    {
        // convertit le slug
        $slug = Str::slug($request->slug);
        $test = Slug::where('slug', $slug)->first();

        // s'il existe dans la base on retourne une erreur sinon on save();
        if($test !== null)
        {
            return redirect()->route('createSlug')->with('error', 'erreur');
        }
        else
            {
                $DynamicPageRepository->save($request, $slug);
                //return view('Blog\Dashboard\dynamicPage.choiceLayout');
                return redirect()->route('choiceLayout', compact('slug'));
            }
    }



    public function choiceLayout($slug)
    {
        return view('Blog\Dashboard\dynamicPage.choiceLayout', compact('slug'));
    }




    public function storeLayout(Request $request, DynamicPagesRepositoryInterface $DynamicPageRepository)
    {
        $slug = $request->valide;

        $DynamicPageRepository->saveLayout($request);
        return redirect()->route('choiceContent', compact('slug'));

    }

    public function choiceContent($request, DynamicPagesRepositoryInterface $DynamicPageRepository)
    {
        $ChoiceContent =  $DynamicPageRepository->loadChoiceContent($request);
        $contentExplode = $DynamicPageRepository->ExplodeChoiceContent($ChoiceContent);

        return view('Blog\Dashboard\dynamicPage.choiceContent', compact('contentExplode'));



    }
}


