@include('layouts.Dashboard.head')

<body>
<header>
<div>
    <img alt="" src="{{asset('image/logo/BlogNtrottersLogo.png')}}">
</div>
    <nav id="login">
        <a href="{{route('disconnection')}}">Déconnexion</a>
    </nav>
</header>
@include('layouts.Dashboard.navDashboard')


<main id="mainHomeDashboard">

    <section id="sectionIndex">
        @yield('content')
    </section>
    <section id="newPage">
    @yield('newPage')
</main>





</main>
</body>
