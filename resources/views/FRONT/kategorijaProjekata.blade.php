@extends('layouts.index')
{{--@section('naslov')--}}
    {{--<header class="content__title">--}}
        {{--<h3>{{$naslov}}</h3>--}}
    {{--</header>--}}
{{--@endsection--}}

@section('sidebar')
    <section id="homeSideBar">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="scrollbar-inner">

                <!-- Sidebar Contents -->
                <div class="card" >
                    <div class="card-body">
                        <h4 class="card-title">Pojedinačna oblast</h4>
                        <ul class="navigation">
                        @foreach($oblastCategories as $cat)
                        <li class="nav-item">
                        <a href="{{route("katProj",['id'=>$cat->id])}}" class="text-left">
                            <i class="zmdi zmdi-home">

                            </i>
                            {{$cat->name}}
                        </a>
                        </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </aside>
    </section>
@endsection


@section('sadrzaj')
    <section class="content">
        <div class="content__inner">
            <section id="projekti">
                <header class="content__title">
                    <div class="content__header text-center">
                        <h2>{{$naslov}}</h2>
                    </div>
                </header>
                <!-- Page Contents -->
                <div class="row groups">

                    @foreach($projekti as $projekat)
                        <!-- Card-->
                            <div class="card col-xl-4 col-lg-4 col-sm-6 col-6" >
                                <a href="{{route('single',['slug'=>$projekat->slug])}}" title="">
                                    <div class="card-header_1 text-center">
                                        <h4>{{$projekat->naslov}}</h4>
                                        <span>
                                            @for ($i = 0; $i < $projekat->skill; $i++)
                                                <i class="zmdi zmdi-star zmdi-hc-fw text-warning"></i>
                                            @endfor
                                        </span>
                                    </div>
                                    <img class="card-img-top" src="{{asset($projekat->slika)}}">
                                    <span class="card-subtitle_1 lead" ><h5 style="margin-top: 13px;">{{$projekat->podnaslov}}</h5></span>
                                <div class="card-body_1">
                                    <p>{!! $projekat->sadrzaj !!}</p>
                                </div>
                                </a>
                                <a href="{{route('single',['slug'=>$projekat->slug])}}" class="card-link_1 read-more">Više o projektu ...</a>
                            </div>
                    @endforeach
                    <!-- EndOfCard -->

                </div>
                <!-- EndOfRow -->
                <!-- Paginacija -->
                {{--{{$oblastProjekti->links('vendor.pagination.bootstrap-4')}}--}}
            </section>
        </div>
    </section>
@endsection