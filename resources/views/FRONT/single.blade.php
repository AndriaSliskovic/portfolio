@extends('layouts.frontIndex')

@section('header')

    <div class="p-2">
        <form class="search">
            <div class="search__inner">
                <input type="text" class="search__text" placeholder="Search ...">
                <i class="zmdi zmdi-search search__helper" data-sa-action="search-close"></i>
            </div>
        </form>
    </div>

    <!-- Sat -->
    <div class="clock hidden-md-down p-2">
        <div class="time">
            <span class="time__hours"></span>
            <span class="time__min"></span>
            <span class="time__sec"></span>
        </div>
    </div>
    <!-- EndOfSat -->
@endsection

@section('sadrzaj')
    <!-- Content -->
<section class="content">
    {{--<div class="content__inner">--}}
        <header class="content__title">
            @if($projekat->linkProjekta)
                {{--Na serveru dati apsolutnu putanju--}}
            <a href="{{route('url',['url'=>$projekat->linkProjekta])}}" title="Link prema web lokaciji" class="badge badge-success">
                <h4>Link prema web lokaciji</h4>
            </a>
                @else
            <div class="badge badge-warning" title="Link projekta ne postoji">
                <h4 >Projekat nema svoj link</h4>
            </div>
            @endif
            @if($projekat->linkGitHuba)
            <a href="{{$projekat->linkGitHuba}}" title="Link prema GitHub-u" class="badge badge-info">
                <h4>Link prema GitHub-u</h4>
            </a>
                @else
                    <div class="badge badge-warning" title="Link GitHub-a ne postoji">
                        <h4 >Projekat nema svoj GitHub link</h4>
                    </div>
            @endif
        </header>

        <div class="row">
            <!-- Pojedinacni projekat -->
            <div class="col-lg-8 col-md-6">
                <div class="card">
                    <div class="row">
                        <!-- AutorProjekta -->
                        <div class="col-lg-3">
                            <div class="contacts__item">
                                <a href="" class="contacts__img">
                                    <img src="{{asset($owner->slika)}}" alt="img/slike/card/default.png">
                                </a>
                                <div class="contacts__info">
                                    <strong>{{$owner->ime.' '.$owner->prezime}}</strong>
                                    <small>{{$owner->email}}</small>
                                </div>
                            </div>
                        </div>
                        <!-- EndOfAutorPosta -->
                        <!-- SlikaPosta -->
                        <div class="col-lg-6">
                                <img class="card-img-top" src="{{asset($projekat->slika)}}" alt="slika projekta">
                        </div>
                        <!-- EndOfSlikaPosta -->
                        <!-- InformacijeOPostu -->
                        <div class="card-body col-lg-3">
                            <h5>Vreme izrade :</h5>
                            <time class="published" datetime="2016-04-17 12:00:00">
                                {{--{{$projekat->vremeIzrade->format('m/d/Y')}}--}}
                                {{Carbon\Carbon::parse($projekat->vremeIzrade)->diffForHumans()}}
                            </time>
{{--SKILL--}}
                            <h5>Skill :</h5>
                            <div>
                                @for ($i = 0; $i < $projekat->skill; $i++)
                                <i class="zmdi zmdi-star zmdi-hc-fw text-warning"></i>
                                @endfor
                            </div>

                        </div>
                        <!-- EndOfInformacijeOPostu -->
                    </div>
                    {{--NASLOV--}}
                    <div class="d-flex justify-content-center text-uppercase"><h3>{{$projekat->naslov}}</h3></div>
                    {{--PODNASLOV--}}
                    <div class="card-body ">
                        <div class="d-flex justify-content-center"><h5>{{$projekat->podnaslov}}</h5>
                        </div>
                        {{--Upotrebljeno !!  !! da bi se izbeglo latter escapes the string--}}

                        <div class="card-body ">{!!$projekat->sadrzaj!!}</div>

                    </div>
                    <div class="blog__arthur">
                        <div class="blog__arthur-img">
                            <img src="{{asset($projekat->slika)}}" alt="img/slike/card/default.png">
                        </div>

                        <h6>{{$owner->ime.' '.$owner->prezime}}</h6>
                        <small>{{$owner->email}}</small>

                    </div>
                </div>
            </div>
            <!-- EndOfGlavni postovi -->

            <!-- DesniPostovi -->
            <!-- PostoviPoKategorijama -->
            <div class="col-lg-4 col-md-5 hidden-md-down">
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('frontHome')}}">
                        <h4 class="card-subtitle badge badge-info" title="Povratak na stranu svih projekata">Pregled svih predstavljenih projekata</h4>
                        </a>
                    </div>

                    <div class="listview listview--hover">
                        @foreach($projekti as $projekat)
                        <a class="listview__item" href="{{route('single',['slug'=>$projekat->slug])}}" title="{{$projekat->podnaslov}}">
                            <img src="{{asset($projekat->slika)}}" class="listview__img" alt="">

                            <div class="listview__content">
                                <div class="listview__heading text-truncate">{{$projekat->naslov}}</div>
                                <p>{{$projekat->vremeIzrade}}</p>
                            </div>
                        </a>
                        @endforeach


                        <div class="m-4"></div>
                    </div>
                </div>
                <!-- EndOfPostoviPoKategorijama -->


            </div>
            <!-- EndOfDesni postovi -->
        </div>
        <!-- EndOfRow -->
        <footer class="footer hidden-xs-down">
            <p>Andria Slišković & Super Admin Responsive. All rights reserved.</p>

            <ul class="nav footer__nav">
                <a class="nav-link" href="{{route('home')}}">Početna</a>

                <a class="nav-link" href="">ANSLI D.O.O.</a>

                <a class="nav-link" href="{{route('kontakt')}}">Kontakt</a>
            </ul>
        </footer>
    {{--</div>--}}


</section>
@endsection

@section('sidebar')

    <!-- LeviNav -->
    {{--Pretezna kategorija--}}
    <a href="{{route('oblastProjekata',['$id'=>$oblastId])}}">
        <div class="card tags">
            <div class="card-body">
                <h5 class="card-title">Pretežna kategorija :</h5>
                <h4 class="text-primary">{{$kategorija}}</h4>
            </div>
        </div>
    </a>

    <!-- Tagovi -->
    <div class="card tags">
        <div class="card-body">
            <h4 class="card-title">Pripadajući tagovi :</h4>
            <div class="tags__body">
                @foreach($tagovi as $tag)
                    <a href="" class="text-warning">{{$tag->tag}}</a>
                @endforeach
            </div>
        </div>
    </div>
    <!-- EndOfTagovi -->

@endsection

