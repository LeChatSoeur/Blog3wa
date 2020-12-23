<?php


namespace App\Repositories;


use App\Models\Blog\Dashboard\Choice_content;
use App\Models\Blog\Dashboard\choice_layout;
use App\Models\Blog\Dashboard\Slug;
use Illuminate\Support\Str;

class DynamicPageRepository implements DynamicPagesRepositoryInterface
{

    public function loadChoiceContent($slug)
    {
        $slug = Slug::where('slug', $slug)->first('id');
        return Choice_layout::where('slug_id', $slug->id)->first('choiceLayout');
    }


    public function saveChoiceLayout($request)
    {
        $id =  Slug::select('id')->where('slug', $request->slug)->first();


        $data = $request->validate([
            'title' => 'nullable',
            'headerHeight' => 'nullable',
            'image' => 'nullable',
            'choiceLayout' => 'required|min:15|max:17',
            'slug' => 'required|',
            'slug_id' => 'unique:choice_layouts'
        ]);

        // explode choiceLayout pour récupérer la width du content
        $headerExplode = explode("_", $data['choiceLayout']);
        $contentExplode = explode("-", $headerExplode[0]);

        $contentWidth = $contentExplode[1];



        $layout = new Choice_layout();
        $layout->content_width = $contentWidth;
        $layout->header_image = $data['image'];
        $layout->header_height = $data['headerHeight'];
        $layout->title = $data['title'];
        $layout->slug_id = $id->id;
        $layout->save();
        return $layout;
    }

    public function saveChoiceContent($request)
    {

        $data = $request->validate([
            'slug' => 'required',
            'content' => 'required',
        ]);


        if (!empty($data)) {

            $layout = new Choice_content();
            $layout->content = $data['content'];
            $layout->slug_id = $data['slug'];
            $layout->save();
        }
    }

    public function PrepareHeaderDynamic($slug, $choiceLayout)
    {
    // on prepare la règle css dynamique
            $image = $choiceLayout->header_image;
            $height = $choiceLayout->header_height.'px';

            $string = "#$slug-image{
    background-image : url('../../storage/uploads/$image');
    height : $height;
    display : flex;
    justify-content: center;
}
";


        return ["header_image" => $choiceLayout->header_image,
            "string" => $string
        ];
    }


    public function prepareContentDynamic($slug, $choiceLayout)
    {
    // on prepare la règle css dynamique
        $widthContent = $choiceLayout->content_width.'%';

        $string = "#$slug-widthContent{
    width: $widthContent;
}
";


        return ["header_image" => $choiceLayout->null,
            "string" => $string
        ];
    }


    public function saveStyleDynamic($slug,$string)
    {

        //recupère la longueur du fichier css
        $fileSize = filesize("../public/storage/css/styleDynamique.css");

        // ouvre et lecture du fichier
        $handle = fopen("../public/storage/css/styleDynamique.css", 'rb');
        $content = fread($handle, $fileSize);


        if(($string['header_image']) !== null)
        {
           // return false si strrpos ne trouve pas #slug-image dans styleDynamique.css

            $stringStart = strrpos($content, "#$slug-image", 0);
            $stringEnd = strpos($content, '}', ($stringStart));
            $stringFinish = $string['string'];


        // sinon il indique le numéro du premier octet
        }
        else
            {
            $stringStart = strrpos($content, "#$slug-widthContent", 0);
            $stringEnd = strpos($content, '}', ($stringStart));
            $stringFinish = $string['string'];
            }


        // la règle css existe
        if($stringStart !== false)
        {
            // on recupère sa position exacte en octet
            $stringSize =  ($stringEnd + 1) - $stringStart;

            // on remplace
            $test = substr_replace($content, $stringFinish, $stringStart, $stringSize);


            $handle = fopen("../public/storage/css/styleDynamique.css", 'wb+');
            fwrite($handle, $test);

        }
        // sinon on créer la règle css à la suite
        else
        {
            $handle = fopen("../public/storage/css/styleDynamique.css", 'ab+');
            fwrite($handle, $stringFinish );


        }
        fclose($handle);


        }

}



