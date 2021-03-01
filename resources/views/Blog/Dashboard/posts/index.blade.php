@extends('homeDashboard')
@section('content')


            @if(session('status'))
                <div class="sessionStatus">
                    {{session('status')}}
                </div>
            @endif

            @if(session('error'))
                <div class="sessionError">
                    {{session('error')}}
                </div>
            @endif

            <table class="indexTable">
                <caption>Liste des articles</caption>
                <thead>
                    <tr>

                        <td>Modifier</td>
                        <td class="deleteMediaQueries">Création article</td>
                        <td class="deleteMediaQueries">Modification article</td>
                        <td>Titre</td>
                        <td>Supprimer</td>
                    </tr>
                </thead>
                <tbody>

                @isset($posts)
                @foreach($posts as $post)

                    <tr>


                        <td>
                            <a href="{{ route('edit',['slug'=>$post['slug_id']]) }}">
                                <img class="iconPostsIndex" src="{{asset('image/icon/update.png')}}"
                                     alt="modifier article" data-id="{{$post['id']}}">
                            </a>
                        </td>

                        <td class="deleteMediaQueries">{{$post['created_at']}}</td>
                        <td class="deleteMediaQueries">{{$post['updated_at']}}</td>
                        <td>{{Str::limit(($post['title']),30, '...')}}</td>

                        <td>
                            <form action="{{ route('destroy', ['id'=>$post['slug_id']]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input class="iconPostsIndex" type="image" alt="icone delete"
                                       src="{{asset('image/icon/delete.png')}}">
                            </form>
                        </td>
                    </tr>

                @endforeach
                @endisset

                </tbody>
            </table>
            <script src="{{asset('js/emptyTagsLocalStorage.js')}}"></script>

@endsection
