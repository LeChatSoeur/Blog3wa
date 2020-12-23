@extends('homeFront')
@section('content')

            <section id="ViewArticle">

                <article class="viewArticle" >
                    <h2>{!!($post->title) !!}</h2>
                    <p>{!!($post->content) !!}</p>
                </article>

            </section>

            <section id="addComment">
                @include('Blog\Front\subfolder\comments')
            </section>

            <script src="{{asset('js/ajaxComment.js')}}"></script>
@endsection

