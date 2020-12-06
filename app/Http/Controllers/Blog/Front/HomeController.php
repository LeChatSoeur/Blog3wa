<?php

namespace App\Http\Controllers\Blog\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog\Dashboard\Choicelayout;
use App\Models\Blog\Dashboard\Slug;
use App\Models\Blog\Front\Comment;
use App\Models\Blog\Post;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('Blog\Front.index',compact('posts'));
    }

    public function viewArticle($slug)
    {

        $slugId = Slug::where('slug', $slug)->get('id');
        $slugId = $slugId[0]->id;
        $post = Post::where('slug_id', $slugId)->get();
        $post = $post[0];


        $comments = Comment::where('post_id', $post->id )->get();
        $commentsParent = [];
        $commentsChild = [];

        foreach($comments as $comment)
        {
            if($comment->parent_id === null)
            {
                $commentsParent [] = $comment;
            } else
            {
                $commentsChild [] = $comment;
            }
        }

        return view('Blog\Front\viewArticle',compact(
            'post',
            'commentsChild',
            'commentsParent',
            'slugId'));

    }

    public function pageDynamic($slug)
    {

        $page = Choicelayout::where('slug', $slug)->get();

        return view('Blog\Front.pageDynamic', compact('page'));
    }

}
