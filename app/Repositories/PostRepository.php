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

        $dataSlug = $request->validate([
            'slug' => 'required|min:5',
        ]);

        $slugStr = Str::slug($dataSlug['slug']);

        if (!empty($slugStr)) {
            $slug = new Slug();
            $slug->slug = $slugStr;
            $slug->save();
        }
        $data = $request->validate([

            // Validate test aussi le token du formulaire
            'title' => 'required|unique:posts|min:10|max:255',
            'content' => 'required|min:5',
            'pays' => 'required',
            'region' => 'nullable',
            'province' => 'nullable',
        ]);

        if (!empty($data)) {
            $post = new Post();
            $post->title = $data['title'];
            $post->content = $data['content'];
            $post->pays = $data['pays'];
            $post->region = $data['region'];
            $post->province = $data['province'];
            $post->slug_id = $slug->id;
            $post->save();


            $dataTags = $request->validate([
                'tags' => 'nullable|min:3',
            ]);


            $dataTags = implode(",", $dataTags);
            $final = explode(',', $dataTags);


            foreach ($final as $test) {
                $test1 = $test;
                $tag = new Tag();
                $tag->name = $test1;
                $tag->slug = $test1;
                $tag = Tag::firstOrCreate(['name' => $test1]);
                $tags_id[] = $tag->id;
                $post->tags()->sync($tags_id);
            }
        }

    }

    public function update($request, $id)
    {
        $data = $request->validate([
            // l'ID du title est ignoré dans la requête pour le titre unique.
            'title' => 'required|max:255|unique:posts,' . 'id',
            'content' => 'required|min:5',
            'region' => 'nullable',
            'province' => 'nullable',
        ]);
        //dd($data);
        if (!empty($data)) {
            $post = Post::find($id);
            $post->title    = $data['title'];
            $post->content  = $data['content'];
            $post->save();
        }
    }

    public function upload($request)
    {
        if($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            //Upload File
            $request->file('upload')->storeAs('public/uploads', $filenametostore);


            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/uploads/'.$filenametostore);
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
    }


}
