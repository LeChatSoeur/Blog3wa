@extends('homeDashboard')
@section('content')

    <button id="newArticle"><a href="{{route('create')}}">Creer un nouvel article</a></button>
    @if(session('status'))
        <div class="sessionStatus">
            {{session('status')}}
        </div>
    @endif
    <table id="postsIndexTable">
        <caption>Liste des articles</caption>
        <thead>
            <tr>
                <td>Voir</td>
                <td>Modifier</td>
                <td>Création article</td>
                <td>Modification article</td>
                <td>Titre</td>
                <td>Contenu</td>
                <td>Image principale</td>
                <td>Up vote</td>
                <td>Down vote</td>
                <td>Supprimer</td>
            </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>
                    <img class="iconPostsIndex" src="{{asset('image/icon/view.png')}}"
                         alt="lire l'article" data-id="{{$post->id}}">
                </td>
                <td>
                    <a href="{{ route('edit',['id'=>$post->id]) }}">
                        <img class="iconPostsIndex" src="{{asset('image/icon/update.png')}}"
                            alt="modifier article" data-id="{{$post->id}}">
                    </a>
                </td>

                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>{{$post->updated_at->diffForHumans()}}</td>
                <td>{{Str::limit(($post->title),40, '...')}}</td>
                <td>{{Str::limit(($post->content),255, '...')}}</td>
                <td><img class="img" src="{{$post->image}}"></td>
                <td>{{$post->up_vote}}</td>
                <td>{{$post->down_vote}}</td>
                <td>
                    <form action="{{ route('destroy', ['id'=>$post->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input class="iconPostsIndex" type="image" src="{{asset('image/icon/delete.png')}}">
                    </form>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
@endsection
