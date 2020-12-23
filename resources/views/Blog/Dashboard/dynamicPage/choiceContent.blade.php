@extends('homeDashboard')
@section('newPage')


            <form id="createContentDynamic" id="{{$choiceLayout->slug->slug}}-widthContent"
                  action="{{route('saveChoiceContent')}}" method="POST">
                @csrf
                <input type="hidden" name="slug" value="{{$choiceLayout->slug_id}}">

                <fieldset>
                    <legend>Création de votre contenu</legend>

                    <div id="divTextareaCreateContent">
                        <textarea required id="content" name="content" rows="15">{{ old('content') }}
                        </textarea>
                    </div>

                    @error('content')
                        <p class="errorAlreadyTaken">{{ $message }}</p>
                    @enderror


                    <div class="createButtons">
                        <button class="addArticle" type="submit">Ajouter</button>
                        <a href ="{{route('menu')}}">Annuler</a>
                    </div>
                </fieldset>

            </form>


@endsection
