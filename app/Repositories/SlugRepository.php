<?php


namespace App\Repositories;


use App\Http\Controllers\Blog\Dashboard\DynamicPageController;
use App\Models\Blog\Dashboard\Choice_content;
use App\Models\Blog\Dashboard\Choice_layout;
use App\Models\Blog\Dashboard\Slug;
use App\Models\Blog\Post;

class SlugRepository implements SlugsRepositoryInterface
{
    public function saveSlug($request, $slug)
    {

        $data = $request->validate([
            // Validate test aussi le token du formulaire
            'slug' => 'required|min:5|max:50',
            'nameNav' => 'required|min:5|max:50',
            'child_id' => 'required|max:1',

        ]);

        $Slug = new Slug();
        $Slug->slug = $slug;
        $Slug->nameNav = $data['nameNav'];
        $Slug->child_id = $data['child_id'];
        $Slug->save();
        return $Slug;
    }

    public function deleteSlugPage($slugsNav)
    {

        $slugNav = [];
        foreach ($slugsNav as $slug) {

            if( (Choice_layout::where('slug_id', $slug->id)->exists())
                                        &&
                (Choice_content::where('slug_id', $slug->id)->exists()) )
            {
               $slugNav[] = $slug;

            }
            else
                {
                    $slug = Slug::find($slug->id);
                    $slug->delete();
                }

        }
        return $slugNav;
    }

    public function deleteSlugArticle($slugsPost)
    {

        foreach ($slugsPost as $slug) {

            if(Post::where('slug_id', $slug->id)->exists() === false)
            {
                $slug = Slug::find($slug->id);
                $slug->delete();
            }
        }
    }

}
