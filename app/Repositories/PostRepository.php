<?php


namespace App\Repositories;


use App\Models\Blog\Dashboard\Slug;
use App\Models\Blog\Post;
use App\Models\Blog\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PDO;

class PostRepository implements PostsRepositoryInterface
{
    public function save($request)
    {
        //SAVE ARTICLE
        $data = $request->validate([

            'title' => 'required|unique:posts|min:10|max:255',
            'content' => 'required|min:5',
            'pays' => 'required',
            'region' => 'nullable',
            'province' => 'nullable',
            'slug_id'        => 'required',
        ]);

               if (!empty($data)) {

                   $pdo = new PDO(
                       'mysql:host=localhost;dbname=blog_n_trotters',
                       'root',
                       'root',
                   );
                   $sql = "INSERT INTO posts
                                            (created_at,
                                             updated_at,
                                             title,
                                             content,
                                             pays,
                                             region,
                                             province,
                                             slug_id)
                           VALUES(NOW(), NOW(), ?, ?, ?, ?, ?, ?)";

                   $query = $pdo->prepare($sql);
                   $query->execute([$data['title'], $data['content'], $data['pays'], $data['region'], $data['province'], $data['slug_id'] ]);


                   // SAVE TAG
                   /////////////////////////////////////
                   // non active pour la correction
                    /////////////////////////////////////
                   /*
                   $dataTags = $request->validate([
                       'tags' => 'nullable|min:3',
                   ]);

                    $postss = Post::all()->where($data['slug_id']);
                   dd($postss);
                   $dataTags = explode(',', $dataTags['tags']);

                   foreach ($dataTags as $dataTag)
                   {
                       $tag = new Tag();
                       $tag->name = $dataTag;
                       $tag->slug = $dataTag;
                       $tag = Tag::firstOrCreate(['name' => $dataTag]);
                       $post->tags()->sync($tag->tag_id);
                   }
                   */

        }

    }

    public function post($slug, $pdo): array
    {

        $postSql = "SELECT id, title, content FROM posts where slug_id = $slug";
        $query = $pdo->query($postSql);
        $post = $query->fetchALL(PDO::FETCH_ASSOC);

        return $post;

    }


    public function update($request, $id)
    {
        $data = $request->validate([
            'title' => 'required|max:255|unique:posts,' . 'id',
            'content' => 'required|min:5',
        ]);


        if (!empty($data)) {

            $pdo = new PDO(
                'mysql:host=localhost;dbname=blog_n_trotters',
                'root',
                'root',
            );

            $sql = "UPDATE  posts
                    SET
                        updated_at = now(),
                        title = ?,
                        content = ?
                    WHERE id = ?
                    ";

            $query = $pdo->prepare($sql);
            $query->execute([$data['title'], $data['content'], $id]);

        }

        /*
        if (!empty($data)) {
            $post = Post::find($id);
            $post->title    = $data['title'];
            $post->content  = $data['content'];
            $post->save();
        }
        */
    }


    public function destroy($id, $pdo)
    {

        $sql = "DELETE FROM slugs
                WHERE id = ? ";
        $query = $pdo->prepare($sql);
        $query->execute([$id]);

        /*
        $page = Slug::find($id);
        $page->delete();
        */
    }




}
