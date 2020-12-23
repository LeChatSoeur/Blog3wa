@extends('homeDashboard')
@section('newPage')

        <div id="divFormInscription">
            <form id="formSlug"  action="{{route('storeSlug')}}" method="POST">
                @csrf
                <fieldset>
                    <div class="labelInput">
                        <p>Veuillez taper votre lien:
                            <input type="text" name="slug" id="inputSlug" >
                        </p>
                        <p>Ce qui apparaitra dans votre barre de navigation:
                            <input type="text" name="nameNav" id="inputNameNav">
                        </p>
                    </div>
                    <div id="PreviewSlug">
                        <p>Votre lien: <span></span></p>
                    </div>
                    @error('slug')
                        <!--Gère l'erreur du title s'il n'est pas unique-->
                        <p class="errorAlreadyTaken">{{ $message }}</p>
                    @enderror
                    <input type="hidden" name="child_id" value="{{$child_id}}">

                    <div class="divInformation">
                        <input class="inputInformation" type="checkbox">
                        <img class="imgInformation"
                             src="{{url('image/icon/information.svg')}}"
                             alt="Icône pour donner des informations concernant les tags">

                        <span class="popupText">Exemple : www.Blog_N_Trotters.com/je-suis-le-futur-lien
                            (les espaces seront remplacés par des << - >> et les caractères spéciaux supprimé.)
                        </span>

                    </div>

                    <div class="divButton">
                        <button name="valide" type="submit">valider</button>
                        <a href ="{{route('menu')}}">Annuler</a>
                    </div>

                </fieldset>
            </form>
        </div>
        <script src="{{asset('js/choiceSlug.js')}}"></script>
@endsection
