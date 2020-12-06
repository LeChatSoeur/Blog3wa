@extends('homeFront')
@section('content')

    <div class="image">
        <img class="img" src="{{asset('image/logo/logo-BlogNtrotters.png')}}">
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
                    <label for="dob-select">Votre date de naissance</label>
                    <select name="dobDay" id="dob-select">
                        <option type="day" value="0">jour</option>
                        <?php for($i = 1; $i <= 31; $i++)
                        {
                            echo '<option value="' . $i . '">' . $i . '</option>';
                        }
                        ?>
                    </select>
                    <select name="dobMonth" id="dob-select">
                        <option type="month" value="0">mois</option>
                        <option type="month" value="1">Janvier</option>
                        <option type="month" value="2">Février</option>
                        <option type="month" value="3">Mars</option>
                        <option type="month" value="4">Avril</option>
                        <option type="month" value="5">Mai</option>
                        <option type="month" value="6">Juin</option>
                        <option type="month" value="7">Juillet</option>
                        <option type="month" value="8">Aout</option>
                        <option type="month" value="9">Septembre</option>
                        <option type="month" value="10">Octobre</option>
                        <option type="month" value="11">Novembre</option>
                        <option type="month" value="12">Décembre</option>

                    </select>
                    <select name="dobYear" id="dob-select">
                        <option type="month" value="0">année</option>
                        <?php for($i = 1970; $i <= 2020; $i++)
                        {
                            echo '<option value="' . $i . '">' . $i . '</option>';
                        }
                        ?>
                    </select>
                </div>

            <p id="termsOfUse">En créant un compte, vous acceptez nos <a href="#">conditions d’utilisation.</a></p>
            <div id="divButtonInscription">

                <button name="valide" type="submit">valider</button>
                <button name="valide" type="#">annuler</button>
            </div>
        </fieldset>
    </form>
    </div>


@endsection
