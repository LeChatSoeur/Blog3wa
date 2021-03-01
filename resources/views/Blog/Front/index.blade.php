@extends('homeFront')
@section('content')



<div id="listArticle">

    @foreach($posts as $post)

        <article>
            <div>{{$post->created_at->diffForHumans()}}</div>
            <h3>
                <a href="{{ route('viewArticle', ['slug'=>$post->slug_id]) }}">{{Str::limit(($post->title),40, '...')}}
                </a>
            </h3>
            <p>{{Str::limit($post->content, 100), '...' }}</p>
        </article>
    @endforeach
</div>


@endsection
