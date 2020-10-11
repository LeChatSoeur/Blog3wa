<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();

        /*
        if ($posts->created_at <= 1)
        {
            $posts->created_at->diffForHumans();
        } else
            {
                $posts->created_at;
            }
        */
        return view('Blog\posts.index', compact('posts'));
    }


    public function create()
    {
        return view('Blog\posts.create');
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            // Validate test aussi le token du formulaire
            'title' => 'required|unique:posts|max:255',
            'content' => 'required|min:510',
        ]);
        //dd($data);
        //$title = Post::all('title');

        if (!empty($data)) {
            $post = new Post;
            $post->title    = $data['title'];
            $post->content  = $data['content'];
            $post->save();
        }
        return redirect('admin/liste-articles')->with('status', 'Article créer!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
       //dd($id);
        $post = Post::find($id);
        return view('Blog\posts.edit',compact('post'));

    }

    public function update(Request $request, $id)
    {

            //'title' => 'required|unique:posts|max:255',

        $data = $request->validate([
            // l'ID du title est ignoré dans la requête pour le titre unique.
            'title' => 'required|max:255|unique:posts,' . 'id',
            'content' => 'required|min:510',
        ]);
        //dd($data);
        if (!empty($data)) {
            $post = Post::find($id);
            $post->title    = $data['title'];
            $post->content  = $data['content'];
            $post->save();
        }
        return redirect('admin/liste-articles')->with('status', 'Article modifié!');
    }

    public function destroy($id)
    {
        //dd($id);
        $post = Post::find($id);
        $post->delete();
        return redirect('admin/liste-articles')->with('status', 'Article supprimé!');



    }
}
