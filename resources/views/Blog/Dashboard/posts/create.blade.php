@extends('homeDashboard')
@section('content')


        <form id="createArticle" action="{{route('store')}}" method="POST">
            @csrf
            <fieldset>

                <legend>Création de votre article</legend>
                <div class="createTitleContent">
                    <input type="text" name="title" id="title" size="50" required
                           placeholder="Votre Titre" value="{{ old('title') }}">
                </div>
                @error('title')
                    <p class="errorAlreadyTaken">{{ $message }}</p>
                @enderror

                <div class="createTitleContent">
                    <textarea required id="content" name="content" rows="15"
                              placeholder="Exprimez vous!">{{ old('content') }}</textarea>
                </div>
                @error('content')
                    <p class="errorAlreadyTaken">{{ $message }}</p>
                @enderror

                <div id="categoryGeography">
                    <div id="categoryPays">
                        <label>Pays: </label>
                        <select name="pays" id="pays" required>
                            <option value="">Veuillez choisir un pays</option>

                            @foreach($categoryPays as $category)
                                <option value="{{$category->id}}" id="pays-{{$category->id}}">{{$category->title}}</option>
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

                <div class="divInformation">
                    <input class="inputInformation" type="checkbox">
                    <img class="imgInformation"
                         src="{{url('image/icon/information.svg')}}"
                         alt="Icône pour donner des informations concernant les tags">
                    <span class="popupText">Le pays est obligatoire, cependant la région,
                        province et les tags sont optionnels.
                    </span>
                </div>


                <input name="slug_id" type="hidden" value="{{$slug->id}}">

                <div class="createButtons">
                    <button class="addArticle" type="submit">Ajouter</button>
                    <a href ="{{route('posts')}}">Annuler</a>
                </div>
            </fieldset>
        </form>


        <script src="{{asset('js/ajaxList.js')}}"></script>


        @endsection
