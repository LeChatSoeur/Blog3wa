@extends('homeDashboard')
@section('newPage')

        <form id="formChoiceLayout" action="{{route('saveChoiceLayout')}}" method="POST">
            @csrf
            <div id="previewHeader">
                <input id="title" name="title" type="text" placeholder="Votre titre">
                <input id="headerHeight" name="headerHeight" type="hidden" value="150">
                <input id="image" name="image" type="hidden" value="">
                <input id="slug_id" name="slug_id" type="hidden" value="{{$slug->id}}">
            </div>

            <div id="choiceLayout">
                <div>
                    <img src="{{asset('image/dashboard/ExampleDisposition/content-80.jpg')}}" alt="">
                    <input class="{{$slug->slug}}InputRadio" type="radio" id="content-80" name="choiceLayout" value="content-80_null">
                </div>
                <div>
                    <img src="{{asset('image/dashboard/ExampleDisposition/content-50.jpg')}}" alt="">
                    <input class="{{$slug->slug}}InputRadio" type="radio" id="content-50" name="choiceLayout" value="content-50_null">
                </div>
                <div>
                    <img src="{{asset('image/dashboard/ExampleDisposition/content-80-header.jpg')}}" alt="">
                    <input class="{{$slug->slug}}InputRadio" type="radio" id="content-80-header" name="choiceLayout" value="content-80_header">
                </div>
                <div>
                    <img src="{{asset('image/dashboard/ExampleDisposition/content-50-header.jpg')}}" alt="">
                    <input class="{{$slug->slug}}InputRadio" type="radio" id="content-50-aside" name="choiceLayout" value="content-50_header">
                </div>

                <div id="divInputFile">
                    <input id="inputFile" type="file">
                    <button id="loadImage" name="valide" type="button" value="{{$slug->slug}}">charger</button>
                </div>

            </div>

            @error('slug')
                <p class="errorAlreadyTaken">{{ $message }}{{$slug->slug}}</p>
            @enderror

            <p>Choisissez une mise en page</p>

            <div class="createButtons">
                <button id="finish" name="slug" type="submit" value="{{$slug->slug}}">valider</button>
                <a href ="{{route('menu')}}">Annuler</a>
            </div>
        </form>


        <script src="{{asset('js/ajaxChoiceLayout.js')}}"></script>


@endsection
