@extends('homeDashboard')
@section('newPage')


@if($contentExplode['header'] !== 'null')
    <div id="divBackgroundHeader">
        <div>
            <h2>salut</h2>
        </div>
    </div>
@endif
<form id="createArticle">
@csrf

<!--@ csrf fonction dans Laravel pour sécuriser les formulaires contre
                   les attaques CSRF grâce au token-->
    <fieldset>

        <legend>Création votre nouvelle page</legend>
        <div class="createContentwidth">
            <input type="text" name="content_width" id="content_width" size="50" required placeholder=
            "Veuillez indiquer">
        </div>
    @error('createContentwidth')
    <!--Gère l'erreur du title s'il n'est pas unique-->
        <p class="errorAlreadyTaken">{{ $message }}</p>
        @enderror
        <div class="createTitleContent">
            <input type="text" name="slug" id="slug" size="50" required placeholder=
            "Veuillez indiquer le nom de votre nouvelle page,il servira pour le lien et la barre de navigation"
                   value="{{ old('slug') }}">
        </div>
    @error('title')
    <!--Gère l'erreur du title s'il n'est pas unique-->
        <p class="errorAlreadyTaken">{{ $message }}</p>
        @enderror

        <div id="createTitleContent">
                <textarea required type="text" id="content" name="content" rows="15"
                          placeholder="Exprimez vous!">{{ old('content') }}</textarea>
        </div>
        @error('content')
    <!--Gère l'erreur du contenu s'il n'y pas au minimum 510 caractères-->
        <p class="errorAlreadyTaken">{{ $message }}</p>
        @enderror


        <div class="createbuttons">
            <button class="addArticle" type="submit">Ajouter</button>
            <a href ="{{route('login')}}"><button class="cancelArticle" type="button">Annuler</button></a>
        </div>
    </fieldset>



</form>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace('content', {
        filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>
@endsection
