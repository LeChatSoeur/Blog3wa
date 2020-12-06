<div id="divNavDashboard">
    <div id="navProfil">
        <div><img alt="" id="navProfilPicture" src="https://i.pinimg.com/originals/9b/76/75/9b767505f5a5df3df348a898ba4ae8bb.jpg"></div>
            <p id="navProfilName">Serge Olivier</p>
            <p id="navProfilRole">Admin</p>

    </div>
    <ul id=navDashboard>

        <li><a href="{{ route('posts') }}">Liste Article</a></li>
        <li><a href="{{route('create')}}">Creer article</a></li>
        <li><a href="#">Commentaires</a></li>
        <li><a href="#">Statistiques</a></li>
        <li><a href="#">Template</a></li>
        <li><a href="{{route('createSlug')}}">Gérer mon menu</a></li>
        <li><a href="#">Nous contacter</a></li>
        <li><a href="#">Settings</a></li>
    </ul>

</div>
