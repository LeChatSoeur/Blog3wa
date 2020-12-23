@extends('homeFront')
@section('content')


        <div class="imageLogin">
            <a href="{{route('front-posts')}}">
            <img class="img" src="{{asset('image/logo/logo-BlogNtrotters.png')}}" alt="logo du site, Blog_N_trotters">
            </a>
        </div>
        @if(session('message'))
            <div class="sessionError">
                {{session('message')}}
            </div>
        @endif

        <div id="divFormInscription">
            <form id="formInscription"  action="{{route('verificationLogin')}}" method="POST">
                @csrf
                <fieldset>
                    <div class="labelInput">
                        <label for="mail">Votre adresse E-mail ou votre identifiant </label>
                        <input type="text" name="mail" id="mail" >
                    </div>

                    @error('E-mail')
                    <!--Gère l'erreur du title s'il n'est pas unique-->
                        <p class="errorAlreadyTaken">{{ $message }}</p>
                    @enderror

                    <div class="labelInput">
                        <label for="password">Votre mot de passe </label>
                        <input type="password" name="password" id="password">

                    </div>
                        <p id="termsOfUse">Pas encore de compte? <a href="{{route('inscription')}}">cliquez ici</a></p>

                    <div class="createButtons">
                        <button name="valide" type="submit">valider</button>
                        <a href="{{route('front-posts')}}">annuler</a>
                    </div>

                </fieldset>
            </form>
        </div>
@endsection
