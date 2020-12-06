<?php

namespace App\Http\Controllers\Blog\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog\Front\Comment;
use Illuminate\Http\Request;


class CommentController extends Controller
{
    public function addComment(Request $request)
    {

        $email = $request->dataComment['email'];
        $content = $request->dataComment['content'];
        $nameUser = $request->dataComment['nameUser'];
        $post_id = $request->dataComment['post_id'];
        $parent_id = $request->dataComment['parent_id'];


        if (
            (is_numeric($post_id))
            && (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email))
            && (strlen($nameUser) > 3 && strlen($nameUser) < 50)
            && (strlen($content) > 5 && strlen($content) < 500)
            )
        {

            $comment = new Comment();
            $comment->email     = $email;
            $comment->content   = $content;
            $comment->nameUser  = $nameUser;
            $comment->post_id   = $post_id;
            $comment->parent_id = $parent_id;
            $comment->save();

            return response()->json
            ([
                'email'     => $comment->email,
                'content'   => $comment->content,
                'nameUser'  => $comment->nameUser,
                'post_id'   => $comment->post_id,
                'parent_id' => $comment->parent_id,
            ]);

        }
        else
            {
            return response()->json('au moins un des champs du formulaire commentaire n\'est pas valide');
            }
    }

}




