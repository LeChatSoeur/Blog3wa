@extends('homeDashboard')
@section('content')


  <form id="createArticle" action="{{route('store')}}" method="POST">
        @csrf
             <!--@ csrf fonction dans Laravel pour sécuriser les formulaires contre
                   les attaques CSRF grâce au token-->
        <fieldset>

            <legend>Création de votre article</legend>
            <div class="createTitleContent">
                <input type="text" name="slug" id="slug" size="50" required
                       placeholder="Votre slug">
            </div>
            <div class="createTitleContent">
                <input type="text" name="title" id="title" size="50" required
                       placeholder="Votre Titre" value="{{ old('title') }}">
            </div>
            @error('title')
             <!--Gère l'erreur du title s'il n'est pas unique-->
            <p class="errorAlreadyTaken">{{ $message }}</p>
            @enderror

            <div class="createTitleContent">
                <textarea required type="text" id="content" name="content" rows="15"
                          placeholder="Exprimez vous!">{{ old('content') }}</textarea>
            </div>
            @error('content')
             <!--Gère l'erreur du contenu s'il n'y pas au minimum 510 caractères-->
            <p class="errorAlreadyTaken">{{ $message }}</p>
            @enderror
            <div id="categoryGeography">
                <div id="categoryPays">
                    <label>Pays: </label>
                    <select name="pays" id="pays" required>
                        <option value="">Veuillez choisir un pays</option>
                        @foreach($categoryPays as $category)
                            <option value="{{$category->title}}" id="pays-{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>
                @error('pays')
                <p class="errorAlreadyTaken">{{ $message }}</p>
                @enderror

                <div id="categoryRegions">
                    <label>Régions: </label>
                    <select name="region" id="region">
                        <option value ="">----------</option>
                    </select>
                </div>
                <div id="categoryProvinces">
                    <label>Provinces: </label>
                    <select name="province" id="province">
                        <option value="">----------</option>
                    </select>
                </div>

            </div>

            <div class="divInformationTag">
                <img class="informationTag"
                     src="{{url('image/icon/information.svg')}}"
                     alt="Icône pour donner des informations concernant les tags">
                <div class="popupDiv">
                    <span class="popupText">Le pays est obligatoire, cependant la région,
                                            province et les tags sont optionnels.<br>Pour un meilleur référencement,
                            nous vous conseillons fortement de remplir le maximum par rapport à votre article.</span>
                </div>
            </div>
            <div class="afficheTag"></div>
            <div class="categoryTags">
                <textarea type="text" name="tags" class="tagsTextarea" placeholder="tags" rows="1"></textarea>
                <input class="inputHiddenTags" name="tags" type="hidden">
            </div>

            <div class="createbuttons">
                <button class="addArticle" type="submit">Ajouter</button>
                <a href ="{{route('posts')}}"><button class="cancelArticle" type="button">Annuler</button></a>
            </div>
        </fieldset>



    </form>


  <script src="{{asset('js/ajaxList.js')}}"></script>
  <script src="{{asset('js/CreateTags.js')}}"></script>

  <script>
      CKEDITOR.replace('content', {
          filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
          filebrowserUploadMethod: 'form'
      });
  </script>

@endsection
