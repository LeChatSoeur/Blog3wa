@include('layouts.Dashboard.head')

<body id="bodyDashboard">
    <header>
        <div>
            <img alt="" src="{{asset('image/logo/BlogNtrottersLogo.png')}}">
        </div>
        <div id="menuDashboard">
            <input type="checkbox" />
            <span></span>
            <span></span>
            <span></span>
            <ul id=navDashboardMobile>

                <li><a href="{{ route('posts') }}">Liste Article</a></li>
                <li><a href="{{route('createSlugArticle')}}">Creer article</a></li>
                <li><a href="#">Statistiques</a></li>
                <li><a href="#">Template</a></li>
                <li><a href="{{route('menu')}}">Gérer mon menu</a></li>
                <li><a href="{{route('disconnection')}}">Déconnexion</a></li>
            </ul>
        </div>
    </header>

    @include('layouts.Dashboard.navDashboard')


    <main id="mainHomeDashboard">
        <section id="menu">
            @yield('menu')
        </section>

        <section id="sectionIndex">
            @yield('content')
        </section>

        <section id="newPage">
            @yield('newPage')
        </section>

    </main>
</body>
</html>
