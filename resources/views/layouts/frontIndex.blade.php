<!DOCTYPE html>
<html>
<head>
    @component('pocetna.components.front.head',[
    'title'=>$settings->imeSajta
    ])
    @endcomponent

    @stack('vendori_css')
</head>
<body data-sa-theme="{{$settings->theme}}">
<main class="main">
    <!-- Header -->
    <header class="header d-flex">
        <div class="logo hidden-sm-down mr-auto p-2">
            <h1><a href="{{route('home')}}">{{$logo}}</a></h1>
        </div>

<div class="row align-items-center">
    <ul class="nav">
        @yield($navBar)
    </ul>
    {{--Ako je ulogovani user--}}
    @if(!Auth::guest())
        <div class="user">
            <div class="user__info" data-toggle="dropdown">
                <img class="user__img" src="{{asset(Auth::user()->profile['avatar'])}}" alt="">
                <div>
                    <div class="user__name">{{Auth::user()->name}}</div>
                    <div class="user__email">{{Auth::user()->email}}</div>
                </div>
            </div>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{route('profile.show',['id'=>Auth::user()->id])}}">View Profile</a>
                <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
            </div>
            @else
                <ul class="nav justify-content-left">
                    <li><a class="nav-link" href="{{ route('home.login') }}">Login</a></li>
                    <li><a class="nav-link" href="{{ route('register1') }}">Register</a></li>
                </ul>
        </div>
    @endif
</div>
    </header>

    <!-- SIDEBAR -->
    <section id="sidebar">
        <aside class="sidebar">
            <div class="scrollbar-inner">
                @yield($sidebar)
            </div>
        </aside>
    </section>
    <section class="content content--full">
        <div class="content__inner">
            {{--NASLOV--}}
            @yield($naslov)
            {{--GLAVNI SADRZAJ--}}
            @yield($sadrzaj)
        </div>
    </section>

</main>
<!-- Vendors -->
@component('pocetna.components.admin.vendori')
@endcomponent

@stack('vendori_js')
@stack('skripte_js')

<!-- App functions -->
@component('pocetna.components.admin.skripte')
@endcomponent
</body>
</html>