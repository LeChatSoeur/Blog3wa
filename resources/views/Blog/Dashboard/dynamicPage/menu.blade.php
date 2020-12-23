@extends('homeDashboard')
@section('menu')

                @if(session('status'))
                    <div class="sessionStatus">
                        {{session('status')}}
                    </div>
                @endif
                @if(session('message'))
                    <div class="sessionError">
                        {{session('message')}}
                    </div>
                @endif

            <div id="divButtonCreatePage">
                <a href="{{ route('createSlug') }}">nouvelle page texte/image</a>
                <button class="buttonNewPage" id="buttonValid">Valider l'ordre de mon menu</button>
            </div>

            <table class="indexTable">
                <thead>
                    <tr>
                        <td>Odre</td>
                        <td>Afficher</td>
                        <td>Slug</td>
                        <td>Supprimer</td>
                    </tr>
                </thead>
                <tbody>
                    @isset($article)
                    <tr>
                        <td></td>
                        <td>
                            <a href="{{ route('front-posts')}}">
                                <img class="iconPostsIndex" src="{{asset('image/icon/view.png')}}"
                                     alt="lire l'article data-id="{{$article[0]->id}}">
                            </a>
                        </td>
                        <td>
                            <p class="indexSlug" data-nameNav="{{$article[0]->nameNav}}">{{$article[0]->slug}}</p>
                        </td>
                        <td></td>
                    </tr>
                    @endisset
                    @isset($slugsNav)
                    @foreach($slugsNav as $slug)
                        <tr>
                            <td>
                                <input class="checkboxOrderNav" type="checkbox" name="checkbox"
                                       data-id="{{$slug->id}}"
                                       data-nameNav="{{$slug->nameNav}}">
                            </td>
                            <td>
                                <a href="{{ route('pageDynamic', ['slug'=>$slug->slug]) }}">
                                    <img class="iconPostsIndex" src="{{asset('image/icon/view.png')}}"
                                         alt="lire l'article" data-id="{{$slug->id}}">
                                </a>
                            </td>
                            <td>
                                <p class="indexSlug" data-nameNav="{{$slug->nameNav}}">{{$slug->slug}}</p>
                            </td>
                            <td>
                                <form action="{{ route('destroyPageDynamic', ['id'=>$slug->id]) }}" method="POST">
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

            <nav id="previewNav">
            </nav>

            <nav class="nav">

                @isset($PageListArticles)
                    <p>{{$PageListArticles[0]->slug}}</p>
                @endisset

                @foreach($orderNav as $slug)
                    <p>{{$slug['slug']}}</p>
                @endforeach
            </nav>

            <script src="{{asset('js/ordreNav.js')}}"></script>
@endsection
