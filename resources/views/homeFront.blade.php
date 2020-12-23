@include('../layouts.public.head')

<body id="bodyFront">


    <header id="headerFront">

        <nav id="login">
            @if (Illuminate\Support\Facades\Auth::check())
                <a href="{{route('disconnection')}}">Déconnexion</a>
                <a href="{{route('posts')}}">Admin</a>
            @endif
        </nav>

    </header>

    @include('../layouts.public.nav')

    <main id="mainHomeFront">
        @yield('content')
    </main>


</body>
</html>
