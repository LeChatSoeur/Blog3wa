<?php

namespace App\Http\Controllers\Blog\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Blog\Dashboard\Category\Category_pays;
use App\Models\Blog\Dashboard\Slug;
use App\Repositories\SlugsRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SlugController extends Controller
{

    public function storeSlug(Request $request, SlugsRepositoryInterface $SlugRepository)
    {
        // convertit le slug
        $newSlug = Str::slug($request->slug);


        // s'il existe dans la base on retourne une erreur sinon on save();
        if(Slug::where('slug', $newSlug)->first() !== null)
        {
            return redirect()->route('posts')->with('error', 'Vous venez de quitter la page ou le lien est déjà enregistré sous une autre page ');
        }


        if($request->child_id == 2)
        {
            $max = Slug::select('id')->where('child_id', 2)->count();

            if($max >= 6)
            {
                return redirect()->action([DynamicPageController::class, 'index'])->with('message', 'Vous avez atteint la limite de page autorisé');
            }
        }

       $slug =$SlugRepository->saveSlug($request, $newSlug);


        if($request->child_id == 1)
        {
            $categoryPays       = Category_pays::all();
            return view('Blog\Dashboard\posts.create',
                compact('categoryPays', 'slug'));
        }


        if($request->child_id == 2)

        {
            return view('Blog\Dashboard\dynamicPage.choiceLayout', compact('slug'));
        }

    }


    public function destroy($id)
    {
        $page = Slug::find($id);
        $page->delete();
        return redirect()->route('menu')->with('status', 'Page supprimé!');
    }



}
