<?php


namespace App\Repositories;


use App\Models\Blog\Dashboard\choice_layout;
use App\Models\Blog\Dashboard\Slug;
use Illuminate\Support\Str;

class DynamicPageRepository implements DynamicPagesRepositoryInterface
{

    public function save($request, $slug)
    {
        $request->validate([
            // Validate test aussi le token du formulaire
            'slug' => 'required|min:5|max:50',
        ]);

            $Slug = new Slug();
            $Slug->slug = $slug;
            $Slug->save();

    }

    public function saveLayout($request)
    {
        $data = $request->validate([
            // Validate test aussi le token du formulaire
            'choiceLayout'  => 'required|min:10|max:17',
            'valide'        => "required",
        ]);

        // compare si le choiceLayout existe par rapport au choix  que l'on propose.
        $choiceLayout = $data['choiceLayout'];

        if(($choiceLayout !== 'content-80_null') &&
            ($choiceLayout !== 'content-50_null') &&
            ($choiceLayout !== 'content-80_header') &&
            ($choiceLayout !== 'content-50_header'))
        {
            die; // erreur a gerer ( rediction)
        }

        // compare si le slug reçu est bien dans la BD
        $slugs = Slug::all();

        foreach ($slugs as $slug)
        {
            if($data['valide'] === $slug->slug)
            {
                $slug_id = $slug->id;
                // si tout est ok on sauvegarde
                $page = new choice_layout();
                $page->choiceLayout = $data['choiceLayout'];
                $page->slug_id = $slug_id;
                $page->save();
            }
        }

    }

    public function loadChoiceContent($request)
    {
        $slug = Slug::where('slug', $request)->first('id');
        return Choice_layout::where('slug_id', $slug->id)->first('choiceLayout');
    }

    public function ExplodeChoiceContent($content) : array
    {
        $contentExplode = explode("_", $content->choiceLayout);

        $contentExplode = array("width" => $contentExplode[0], "header" =>$contentExplode[1]);
        return $contentExplode;
    }

    public function PrepareAjaxContent($request)
    {
        $data = $request->validate([
            // Validate test aussi le token du formulaire
            'checkbox' => 'required|min:10|max:17',
        ]);
        //explode $request pour :
                                //récupérer la width du content
                                // savoir s'il y a un header ( si oui on récupère sa hauteur ligne XXX)
                                // sauvegarder en BD
        $contentExplode = explode("_", $data['checkbox']);
        $headerExplode  = explode("-", $contentExplode[0] );

        $contentWidth = array("content-width" => $headerExplode[1] );
        $header = array("header" =>$contentExplode[1]);

        return [$contentWidth, $header];





        // écrire le title
        //recuperer le title

        //pense bete j'ai un fait un repository pour upload d'image
        //  ici le content
        // un autre pour sauvegarder le tout !

        // après ca il me reste le css dynamique pour l'enregistrer en BD
        // ensuite je peux faire l'aside



    }

    public function UploadAjaxImage($request)
    {

        if($request->hasFile('img')) {
            //get filename with extension

            $image = $request->file('img');
            $filenamewithextension = $request->file('img')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('img')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            //Upload File
            $request->file('img')->storeAs('public/uploads', $filenametostore);

            return ('uploads/' . $filenametostore);
        }
        return false;
    }

    public function saveAjaxPageDynamic($data)
    {
        dd($content);
    }
}
