<?php

namespace App\Http\Controllers\Blog\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\DynamicPagesRepositoryInterface;
use App\Repositories\NavsRepositoryInterface;
use App\Repositories\SlugsRepositoryInterface;
use Illuminate\Http\Request;

class DynamicPageController extends Controller
{
    public function index(NavsRepositoryInterface $NavRepository, SlugsRepositoryInterface $slugsRepository)
    {

        $PageListArticles = $NavRepository->listArticles();

        // ordonner  la nav par le orderNav_id
        $orderNav = $NavRepository->orderNav();


        // ordonner le tableau par le orderNav_id
        $slugsNav = $NavRepository->slugsNav();


        // si l'user stop le processus de création de page, le slug est recherché et supprimé.
       $slugsNav = $slugsRepository->deleteSlugPage($slugsNav);


        return view('Blog\Dashboard\dynamicPage.menu', compact('PageListArticles','slugsNav','orderNav'));
    }

    public function createSlug()
    {
        $child_id = 2;
        return view('Blog\Dashboard\dynamicPage.choiceSlug', compact('child_id'));
    }

    public function saveLayout(Request $request, DynamicPagesRepositoryInterface $DynamicPageRepository)
    {

        $choiceLayout = $DynamicPageRepository->saveChoiceLayout($request);
        $slug = $choiceLayout->slug->slug;


        // s'il y a une image on commence par la sauvegarder avec la height
        if($choiceLayout->header_image !== null)
        {
            $string = $DynamicPageRepository->PrepareHeaderDynamic($slug, $choiceLayout);
            $DynamicPageRepository->saveStyleDynamic($slug, $string);
        }

        // ensuite la largeur du content
        $string = $DynamicPageRepository->prepareContentDynamic($slug, $choiceLayout);
        $DynamicPageRepository->saveStyleDynamic($slug, $string);


        return view('Blog.Dashboard.dynamicPage.choiceContent', compact('choiceLayout'));

    }


    public function saveContent(Request $request, DynamicPagesRepositoryInterface $DynamicPageRepository)
    {

        $DynamicPageRepository->saveChoiceContent($request);

        return view('Blog\Dashboard\posts.index');
    }


}


