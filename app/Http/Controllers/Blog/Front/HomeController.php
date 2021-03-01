<?php

namespace App\Http\Controllers\Blog\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog\Dashboard\Choice_content;
use App\Models\Blog\Dashboard\Choice_layout;
use App\Models\Blog\Dashboard\Slug;
use App\Models\Blog\Front\Comment;
use App\Models\Blog\Post;
use App\Repositories\NavsRepositoryInterface;
use App\Repositories\PdoRepositoryInterface;
use App\Repositories\PostRepository;


class HomeController extends Controller
{


    public function index(NavsRepositoryInterface $NavRepository)
    {
        $posts = Post::all();
        $orderNav =$NavRepository->navSlug();
        $listArticles = $NavRepository->listArticles();

        return view('Blog\Front.index', compact('posts', 'orderNav', 'listArticles'));
    }



    public function viewArticle($slug, PdoRepositoryInterface $pdoRepository,
                                        NavsRepositoryInterface $NavRepository,
                                        PostRepository $PostRepository)
    {
        $pdo = $pdoRepository->pdo();
        $orderNav =$NavRepository->navSlug();
        $listArticles = $NavRepository->listArticles();

        $post = $PostRepository->post($slug, $pdo);

        $comments = Comment::where('post_id', $post[0]['id'])->get();
        $commentsParent = [];
        $commentsChild = [];

        foreach ($comments as $comment) {
            if ($comment->parent_id === null) {
                $commentsParent [] = $comment;
            } else {
                $commentsChild [] = $comment;
            }
        }

        return view('Blog\Front\viewArticle', compact(
            'post',
            'commentsChild',
            'commentsParent',
            'orderNav',
            'listArticles'));

    }

    public function pageDynamic($slug, NavsRepositoryInterface $NavRepository)
    {
        // page liste d'article que l'user ne peut modifier ou supprimer
        $listArticles = $NavRepository->listArticles();

        $orderNav =$NavRepository->navSlug();

        $slugId = Slug::select('id', 'slug')->where('slug', $slug)->first();

        $choiceLayout = Choice_layout::select('title')->where('slug_id', $slugId->id)->first();

        $choiceContent = Choice_content::select('content')->where('slug_id', $slugId->id)->first();


        return view('Blog\Front.pageDynamic', compact('slugId',
                                                        'choiceLayout',
                                                                    'choiceContent',
                                                                    'listArticles',
                                                                    'orderNav'));
    }

}
