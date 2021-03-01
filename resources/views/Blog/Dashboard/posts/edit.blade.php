@extends('homeDashboard')
@section('content')

        <form id="createArticle" action="{{ route('update', $post[0]['id']) }}" method="POST">
            @method('patch')
            @csrf
            <fieldset>
                <legend>Modifier votre article</legend>
                <div class="createTitleContent">
                    <input type="text" name="title" id="title" size="50" required
                           placeholder="Votre Titre" value="{{ $post[0]['title'] }}">
                </div>

                @error('title')
                    <p class="errorAlreadyTaken">{{ $message }}</p>
                @enderror

                <div class="createTitleContent">
                    <textarea name="content" id="content" rows="15" required
                              placeholder="Exprimez vous!">{{ $post[0]['content'] }}</textarea>
                </div>

                @error('content')
                    <p class="errorAlreadyTaken">{{ $message }}</p>
                @enderror

                <div class="createButtons">
                    <button type="submit">Valider</button>
                    <a href ="{{ route('posts') }}">Annuler</a>
                </div>
            </fieldset>
        </form>

@endsection
