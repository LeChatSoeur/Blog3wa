<?php

namespace App\Http\Controllers\Blog\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Blog\Dashboard\Slug;
use App\Models\Blog\Post;
use App\Repositories\PostsRepositoryInterface;
use App\Repositories\SlugsRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(SlugsRepositoryInterface $slugsRepository)
    {
        $posts = Post::all();

        $slugsPost = Slug::select('id')
            ->where('child_id', 1)->get();


        // si $slug n'est pas relier à un content je le supprime
        // ( action arrêter en cours de route par l'user)
        $slugsRepository->deleteSlugArticle($slugsPost);

        return view('Blog\Dashboard\posts.index', compact('posts'));
    }



    public function createSlug()
    {

        //  child_id = 1 ==> article /// child_id = 2 ==> page dynamic
        $child_id = 1;
        return view('Blog\Dashboard\dynamicPage.choiceSlug', compact('child_id'));
    }



    public function store(Request $request, PostsRepositoryInterface $PostRepository): RedirectResponse
    {

        $PostRepository->save($request);

        return redirect()->route('posts')->with('status', 'Article créer!');
    }



    public function edit($slug, PostsRepositoryInterface $PostRepository)
    {
        // recherche le post par rapport au slug
        $post = $PostRepository->post($slug);

        return view('Blog\Dashboard\posts.edit',compact('post'));

    }



    public function update(Request $request, $id, PostsRepositoryInterface $PostRepository)
    {
        $PostRepository->update($request, $id);
        return redirect()->route('posts')->with('status', 'Article modifié!');
    }



    public function destroy($id, PostsRepositoryInterface $PostRepository)
    {
        $PostRepository->destroy($id);
        return redirect()->route('posts')->with('status', 'article supprimé!');
    }


}
