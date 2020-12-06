@extends('homeFront')
@section('content')

<section id="ViewArticle">

    <article class="viewArticle" >
        {!!($post->title) !!}
        {!!($post->content) !!}
    </article>

</section>

<section id="addComment">
    @include('Blog\Front\subfolder\comments')
</section>

@endsection

