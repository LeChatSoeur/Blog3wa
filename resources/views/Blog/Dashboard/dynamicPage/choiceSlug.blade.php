@extends('homeDashboard')
@section('newPage')

    <div id="divFormInscription">
        @if(session('error'))
            <div class="sessionStatus">
                {{session('error')}}
            </div>
        @endif
        <form id="formSlug"  action="{{route('storeSlug')}}" method="POST">
            @csrf
            <fieldset>
                <div class="labelInput">
                    <label for="slug">Veuillez saisir le futur lien de votre page</label>
                    <p>Exemple : www.Blog_N_Trotters.com/je-suis-le-futur-lien
                        (les espaces seront remplacés par des << - >> et que les caractères spéciaux supprimé.)</p>
                    <input type="text" name="slug" id="inputSlug" >
                </div>
                <div id="PreviewSlug">
                    <p>Votre lien:</p>
                </div>
            @error('slug')
            <!--Gère l'erreur du title s'il n'est pas unique-->
                <p class="errorAlreadyTaken">{{ $message }}</p>
                @enderror
                    <button name="valide" type="button">prévisualiser le lien</button>
                    <button name="valide" type="submit">valider</button>
                    <button name="valide" type="#">annuler</button>

            </fieldset>
        </form>
    </div>

@endsection
