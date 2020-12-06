<?php

namespace App\Http\Controllers\Blog\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Blog\Dashboard\Category\Category_pays;
use App\Models\Blog\Dashboard\Slug;
use App\Models\Blog\Post;
use App\Repositories\PostsRepositoryInterface;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();

        return view('Blog\Dashboard\posts.index', compact('posts'));
    }

    public function create()
    {
        $categoryPays       = Category_pays::all();
        return view('Blog\Dashboard\posts.create',
            compact('categoryPays'));

    }
    // vérification et enregistrement de l'article créer
    public function store(Request $request, PostsRepositoryInterface $PostRepository)
    {
        $PostRepository->save($request);
        return redirect()->route('posts')->with('status', 'Article créer!');
    }

    // upload image via la création d'articles
    public function upload(Request $request, PostsRepositoryInterface $PostRepository)
    {
        $PostRepository->upload($request);
    }



    public function edit($slug)
    {
        $categoryPays = Category_pays::all();

        $slugId = Slug::where('slug', $slug)->get('id');
        $slugId = $slugId[0]->id;
        $post = Post::where('slug_id', $slugId)->get();
        $post = $post[0];


        return view('Blog\Dashboard\posts.edit',compact('post','categoryPays'));

    }

    public function update(Request $request, $id, PostsRepositoryInterface $PostRepository)
    {
        $PostRepository->update($request, $id);
        return redirect()->route('posts')->with('status', 'Article modifié!');
    }


    public function destroy($id, PostsRepositoryInterface $PostRepository)
    {
        $PostRepository->destroy($id);
        return redirect()->route('posts')->with('status', 'Article supprimé!');
    }


}
