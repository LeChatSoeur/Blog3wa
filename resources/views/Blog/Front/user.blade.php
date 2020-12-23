@extends('homeFront')
@section('content')

        <div class="image">
            <img class="img" src="{{asset('image/logo/logo-BlogNtrotters.png')}}" alt="logo du site animé">
        </div>

        <div id="divFormInscription">
            <form id="formInscription"  action="{{route('inscription-validation')}}" method="POST">
                @csrf
                <fieldset>
                    <div class="labelInput">
                        <label for="mail">Votre adresse E-mail </label>
                        <input type="text" name="mail" id="mail" >
                    </div>

                    @error('mail')
                        <p class="errorAlreadyTaken">{{ $message }}</p>
                    @enderror

                    <div class="labelInput">
                        <label for="password">Choisissez un mot de passe </label>
                        <input type="password" name="password" id="password">
                    </div>

                    @error('password')
                        <p class="errorAlreadyTaken">{{ $message }}</p>
                    @enderror

                    <div class="labelInput">
                        <label for="pseudo">Choisissez un identifiant </label>
                        <input type="text" name="pseudo" id="pseudo" >
                    </div>

                    @error('pseudo')
                        <p class="errorAlreadyTaken">{{ $message }}</p>
                    @enderror

                    <div class="labelInput">
                        <label for="firstName">Votre nom </label>
                        <input type="text" name="firstName" id="firstName">
                    </div>

                    @error('lastName')
                        <p class="errorAlreadyTaken">{{ $message }}</p>
                    @enderror

                    <div class="labelInput">
                        <label for="lastName">Votre prénom </label>
                        <input type="text" name="lastName" id="lastName">
                    </div>

                    @error('firstName')
                        <p class="errorAlreadyTaken">{{ $message }}</p>
                    @enderror

                    <div class="labelInput">
                        <label for="pays">Votre pays </label>
                        <input type="text" name="pays" id="pays">
                    </div>

                    @error('pays')
                    <p class="errorAlreadyTaken">{{ $message }}</p>
                    @enderror

                    <div class="labelInput">
                        <label>Votre date de naissance</label>
                        <select name="dobDay" class="dob-select">
                            <option value="0">jour</option>

                                @for($i = 1; $i <= 31; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor

                        </select>
                        <select name="dobMonth" class="dob-select">
                            <option value="0">mois</option>
                            <option value="1">Janvier</option>
                            <option value="2">Février</option>
                            <option value="3">Mars</option>
                            <option value="4">Avril</option>
                            <option value="5">Mai</option>
                            <option value="6">Juin</option>
                            <option value="7">Juillet</option>
                            <option value="8">Aout</option>
                            <option value="9">Septembre</option>
                            <option value="10">Octobre</option>
                            <option value="11">Novembre</option>
                            <option value="12">Décembre</option>

                        </select>
                        <select name="dobYear" class="dob-select">
                            <option value="0">année</option>

                                @for($i = 1970; $i <= 2020; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor

                        </select>
                    </div>

                    <p id="termsOfUse">En créant un compte, vous acceptez nos
                        <a href="#">conditions d’utilisation.</a>
                    </p>

                    <div class="createButtons">
                        <button name="valide" type="submit">valider</button>
                        <a href="{{route('front-posts')}}">annuler</a>
                    </div>

                </fieldset>
            </form>
        </div>


@endsection
