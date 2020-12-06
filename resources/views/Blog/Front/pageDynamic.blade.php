@extends('homeFront')
@section('content')

    <section id="ViewArticle">
<p>salut</p>
        <article class="viewArticle" >
            {!!($page[0]->content) !!}
            {!!($page[0]->slug) !!}

        </article>

    </section>


@endsection
