@extends('homeDashboard')
@section('newPage')

    <form id="formChoiceLayout">
        @csrf
        <div id="previewHeader">
            <h2 id="previewTitle"></h2>
            <input type="text" placeholder="Votre titre">
        </div>
        <div id="choiceLayout">
            <div>
                <img src="{{asset('image/dashboard/ExampleDisposition/content-80.jpg')}}" alt="">
                <input class="{{$slug}}InputRadio" type="radio" id="content-80" name="choiceLayout" value="content-80_null">
            </div>
            <div>
                <img src="{{asset('image/dashboard/ExampleDisposition/content-50.jpg')}}" alt="">
                <input class="{{$slug}}InputRadio" type="radio" id="content-50" name="choiceLayout" value="content-50_null">
            </div>
            <div>
                <img src="{{asset('image/dashboard/ExampleDisposition/content-80-header.jpg')}}" alt="">
                <input class="{{$slug}}InputRadio" type="radio" id="content-80-header" name="choiceLayout" value="content-80_header">
            </div>
            <div>
            <img src="{{asset('image/dashboard/ExampleDisposition/content-50-header.jpg')}}" alt="">
            <input class="{{$slug}}InputRadio" type="radio" id="content-50-aside" name="choiceLayout" value="content-50_header">
        </div>
            <div id="divInputFile">
                <input id="inputFile" type="file">
                <button id="valid" name="valide" type="button" value="{{$slug}}">charger</button>
            </div>
        </div>
        <p>Choisissez la mise en page souhaitez</p>
        <div id="divButton">
            <button id="finish" name="valide" type="button" value="{{$slug}}">valider</button>
            <button name="valide" type="#">annuler</button>
        </div>
    </form>



<script src="{{asset('js/ajaxChoiceLayout.js')}}"></script>

@endsection
