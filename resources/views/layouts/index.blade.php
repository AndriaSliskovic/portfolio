<!DOCTYPE html>
<html lang="en">
<head>
    @component('pocetna.components.admin.head',[
    'title'=>$settings->imeSajta
    ])
    @endcomponent
</head>

<body data-sa-theme="{{$settings->theme}}">
<main class="main">


    <!-- Header -->
    <header class="header header d-flex justify-content-around">
        <div class="navigation-trigger hidden-xl-up" data-ma-action="aside-open" data-ma-target=".sidebar">
            <i class="zmdi zmdi-menu"></i>
        </div>

        <div class="logo hidden-sm-down">
            <h1><a href="{{route('home')}}">{{$logo}}</a></h1>
        </div>

        <ul class="nav justify-content-left">
            @foreach($navBar as $nav)
                @if($nav['level']>0)
                <li class="nav-item">
                    <a class="nav-link active" href="{{route($nav['putanja'],$nav['level'])}}">{{$nav['name']}}</a>
                </li>

                @else
                    {{--Da bi se spoljni fajl prikazao u novom prozoru--}}
                    @if($nav['putanja']==='cv')
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route($nav['putanja'])}}" target='_blank'>{{$nav['name']}}</a>
                        </li>

                    @else
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route($nav['putanja'])}}">{{$nav['name']}}</a>
                        </li>
                    @endif
                @endif
            @endforeach
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

    </header>

    <!-- Sidebar -->
    @yield('sidebar')

    {{--Naslov--}}
    @yield('naslov')


    <!-- Contents -->
    @yield('sadrzaj')

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