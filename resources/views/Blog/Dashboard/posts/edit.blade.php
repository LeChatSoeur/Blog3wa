@extends('homeDashboard')
@section('content')

    <form id="createArticle" action="{{ route('update', $post) }}" method="POST">
        <!-- 'PATCH' permet de modifier le formulaire ( l'article ) -->
    @method('patch')
    @csrf
    <!-- @ csrf fonction dans Laravel pour sécuriser les formulaires contre
                        les attaques CSRF grâce au token -->
        <fieldset>
            <legend>Modifier votre article</legend>
            <div class="createTitleContent">
                <input type="text" name="title" id="title" size="50" required
                       placeholder="Votre Titre" value="{{ $post->title }}">
            </div>
        @error('title')
        <!-- Gère l'erreur du title s'il n'est pas unique -->
            <p class="errorAlreadyTaken">{{ $message }}</p>
            @enderror

            <div class="createTitleContent">
                <textarea type="text" name="content" id="content" rows="15" required
                          placeholder="Exprimez vous!">{{ $post->content }}</textarea>
            </div>
            @error('content')
        <!-- Gère l'erreur du contenu s'il n'y pas au minimum 510 caractères -->
            <p class="errorAlreadyTaken">{{ $message }}</p>
            @enderror
            <div class="divInformationTag">
                <img class="informationTag"
                     src="{{url('image/icon/information.svg')}}"
                     alt="Icône pour donner des informations concernant les tags">
                <div class="popupDiv">
                    <span class="popupText">Pour un meilleur référencement,
                            nous vous conseillons fortement de remplir le maximum par rapport à votre article.</span>
                </div>
            </div>
            <div class="afficheTag"></div>
            <div class="categoryTags">
                <textarea type="text" name="tags" class="tagsTextarea" placeholder="tags" rows="1"></textarea>
                <input class="inputHiddenTags" name="tags" type="hidden">
            </div>

            <div class="createbuttons">
                <button type="submit">Valider</button>
                <a href ="{{ route('posts') }}"><button type="button">Annuler</button></a>
            </div>
        </fieldset>
    </form>
    <script src="{{asset('js/CreateTags.js')}}"></script>
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace( 'content', {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
