<body id="bodyFront">
<header id="headerFront">

    <nav id="login">
        @if (Illuminate\Support\Facades\Auth::check())
            <a href="{{route('disconnection')}}">Déconnexion</a>
            <a href="{{route('posts')}}">Admin</a>
        @endif
    </nav>

</header>



