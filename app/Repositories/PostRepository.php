<?php


namespace App\Repositories;


use App\Models\Blog\Dashboard\Slug;
use App\Models\Blog\Post;
use App\Models\Blog\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostRepository implements PostsRepositoryInterface
{
    public function save($request)
    {

        $data = $request->validate([

            'title' => 'required|unique:posts|min:10|max:255',
            'content' => 'required|min:5',
            'pays' => 'required',
            'region' => 'nullable',
            'province' => 'nullable',
            'slug_id'        => 'required',
        ]);

        if (!empty($data)) {
            $post = new Post();
            $post->title = $data['title'];
            $post->content = $data['content'];
            $post->pays = $data['pays'];
            $post->region = $data['region'];
            $post->province = $data['province'];
            $post->slug_id = $data['slug_id'];
            $post->save();


            $dataTags = $request->validate([
                'tags' => 'nullable|min:3',
            ]);


            $dataTags = explode(',', $dataTags['tags']);

            foreach ($dataTags as $dataTag)
            {
                $tag = new Tag();
                $tag->name = $dataTag;
                $tag->slug = $dataTag;
                $tag = Tag::firstOrCreate(['name' => $dataTag]);
                $post->tags()->sync($tag->tag_id);
            }
        }

    }

    public function post($slug)
    {
        $slugId = Slug::where('slug', $slug)->get('id');
        $slugId = $slugId[0]->id;
        $post = Post::where('slug_id', $slugId)->get();
        return $post[0];

    }


    public function update($request, $id)
    {
        $data = $request->validate([
            'title' => 'required|max:255|unique:posts,' . 'id',
            'content' => 'required|min:5',
        ]);


        if (!empty($data)) {
            $post = Post::find($id);
            $post->title    = $data['title'];
            $post->content  = $data['content'];
            $post->save();
        }
    }


    public function destroy($id)
    {
        $page = Slug::find($id);
        $page->delete();
    }




}
