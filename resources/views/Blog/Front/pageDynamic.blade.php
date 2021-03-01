@extends('homeFront')
@section('content')


<section id="viewPageDynamic">

    <div id="{{$slugId->slug}}-image">
        @isset($choiceLayout->title)
        <h2 class="titleHeader">{{($choiceLayout->title) }}</h2>
        @endisset
    </div>
    <article id="{{$slugId->slug}}-widthContent" >

        {{ ($choiceContent->content) }}

    </article>

</section>


@endsection
