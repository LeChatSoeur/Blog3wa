@isset($listArticles)
<nav class="nav">

    @isset($listArticles)
        <p><a href="{{route('front-posts')}}">
                {{$listArticles[0]->slug}}
            </a>
        </p>

    @endisset
    @foreach($orderNav as $slug)
        <p><a href="{{route('pageDynamic', ['slug'=>$slug->slug])}}">
                {{$slug['nameNav']}}
            </a>
        </p>
    @endforeach
</nav>
@endisset
