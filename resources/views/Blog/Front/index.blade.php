@extends('homeFront')
@section('content')
    @isset($posts)
    @foreach($posts as $post)
<article class="viewArticle" >
        {!!($post->content) !!}
    <p> salut je suis le Article</p>
</article>
    @endforeach
    @endisset
@endsection
