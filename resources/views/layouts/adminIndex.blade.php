<!DOCTYPE html>
<html>
<head>
    @component('pocetna.components.admin.head',[
    'title'=>$settings->imeSajta
    ])
    @endcomponent

    @stack('vendori_css')
</head>
<body data-sa-theme="{{$settings->theme}}">
<main class="main">
    <!-- Header -->
    <header class="header header d-flex justify-content-around">
        <div class="navigation-trigger hidden-xl-up" data-ma-action="aside-open" data-ma-target=".sidebar">
            <i class="zmdi zmdi-menu"></i>
        </div>

        <div class="logo hidden-sm-down">
            <h1><a href="{{route('home')}}">Početna strana</a></h1>
        </div>
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
        @endif
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{route('profile.show',['id'=>Auth::user()->id])}}">View Profile</a>
                <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
        @if(Auth::user()->superadmin)
                <a class="dropdown-item" href="{{route('owner.index')}}">Super admin podesavanja</a>
        @endif
            </div>
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
    {{--NASLOV PROJEKTA--}}
    <section class="content">
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