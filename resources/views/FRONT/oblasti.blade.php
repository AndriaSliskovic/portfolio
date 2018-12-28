@extends('layouts.index')
@section('naslov')
@if($settings->theme==3)
    {{--Za prikazivanje QA--}}
    <section class="content">
    <div class="content__inner">
    {{--<header class="content__title">--}}

    {{--</header>--}}
        <div class="row">
        <div class="col-lg-4 ">
            <h5>Izveštaji</h5>
            <table class="table table-hover table-sm">
                <tbody>
                <tr>
                    <td class="align-text-top"><a href="{{ asset('QaIzvestaji/01_TestiranjePocetneStrane.pdf') }}" target="_blank" class="badge badge-success">Testiranje pocetne strane</a>
                    </td>
                </tr>
                <tr>
                    <td class="align-baseline"><a href="{{ asset('QaIzvestaji/02_TestiranjeAdminPanela.pdf') }}" target="_blank" class="badge badge-success">Testiranje Admin panela</a></td>
                </tr>
                <tr>
                    <td class="align-baseline"><a href="{{ asset('QaIzvestaji/03_Registracija_Logovanje_novih_korisnika.pdf') }}" target="_blank" class="badge badge-success">Registracija i logovanje novih korisnika</a></td>
                </tr>
                <tr>
                    <td class="align-baseline"><a href="{{ asset('QaIzvestaji/04_Pristup_Admin_panelu_Nije_admin.pdf') }}" target="_blank" class="badge badge-danger">Pristup admin panelu bez admin ovlašćenja</a></td>
                </tr>
                <tr>
                    <td class="align-baseline"><a href="{{ asset('QaIzvestaji/05_Nepostojeci_user.pdf') }}" target="_blank" class="badge badge-danger">Nepostojeći korisnik</a></td>
                </tr>
                <tr>
                    <td class="align-baseline"><a href="{{ asset('QaIzvestaji/06_Registracija_ivalid_keys.pdf') }}" target="_blank" class="badge badge-danger">Registracija sa pogrešnim podacima</a></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-lg-8 ">
            <div class="row">
                <div class="col-lg-4">
                    <span>Testiranje pocetne strane</span>
                    <video height="120px" width="100%" controls preload="none">
                        <source src="{{ asset('QaIzvestaji/01_TestiranjePocetneStrane.mp4') }}" type="video/mp4">
                    </video>
                </div>
                <div class="col-lg-4">
                    <span>Testiranje admin panela</span>
                    <video height="120px" width="100%" controls preload="none">
                        <source src="{{ asset('QaIzvestaji/02_TestiranjeAdminPanela.mp4') }}" type="video/mp4">
                    </video>
                </div>
                <div class="col-lg-4">
                    <span>Reg. i logovanje novih korisnika</span>
                    <video height="120px" width="100%" controls preload="none">
                        <source src="{{ asset('QaIzvestaji/03_Registracija_Logovanje_novih_korisnika.mp4') }}" type="video/mp4">
                    </video>
                </div>
                <div class="col-lg-4">
                    <span>Pristup bez ovlašćenja admina</span>
                    <video height="120px" width="100%" controls preload="none">
                        <source src="{{ asset('QaIzvestaji/04_Pristup_Admin_panelu_nije_admin.mp4') }}" type="video/mp4">
                    </video>
                </div>
                <div class="col-lg-4">
                    <span>Nepostojeći korisnik</span>
                    <video height="120px" width="100%" controls preload="none">
                        <source src="{{ asset('QaIzvestaji/05_Nepostojeci_user.mp4') }}" type="video/mp4">
                    </video>
                </div>
                <div class="col-lg-4">
                    <span>Reg. sa pogrešnim podacima</span>
                    <video height="120px" width="100%" controls preload="none">
                        <source src="{{ asset('QaIzvestaji/06_Registracija_ivalid_keys.mp4') }}" type="video/mp4">
                    </video>
                </div>

            </div>

        </div>
        </div>
        <div class="badge badge-info d-flex justify-content-around"><h3><a href="http://qatestiranje.ansli.rs">Link ka posebnom sajtu namenjenom testiranju</a></h3></div>
    </div>
    </section>
@endsection
@endif

@section('sidebar')
    <section id="homeSideBar">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="scrollbar-inner">

                <!-- Sidebar Contents -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{$naslov}}</h4>
                        <ul class="navigation">
                        @foreach($oblastCategories as $cat)
                        <li class="nav-item">
                        <a href="{{route("katProj",['id'=>$cat->id])}}" class="text-left">
                            {{--Dinamicki ubacena vrednost u klasu--}}
                            <i class="zmdi zmdi-n-{{$cat->oblast_id}}-square zmdi-hc-fw">

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
                <!-- Page Contents -->
                <div class="row groups">

                    @foreach($oblastProjekti as $projekat)
                        <!-- Card-->
                        <div class="card-demo col-xl-4 col-lg-4 col-sm-6 col-6">

                            <div class="card ">
                                <a href="{{route('single',['slug'=>$projekat->slug])}}" title="">
                                    <div class="card-header_1 text-center"><h4 class="card-title_1">{{$projekat->naslov}}</h4>
                                    </div>
                                    <img class="card-img-top" src="{{asset($projekat->slika)}}">
                                </a>
                                <div class="card-body_1">

                                    <p>{!! $projekat->sadrzaj !!}</p>
                                </div>
                                <a href="{{route('single',['slug'=>$projekat->slug])}}" class="card-link_1 read-more">Više o projektu ...</a>
                            </div>
                        </div>
                    @endforeach
                    <!-- EndOfCard -->
                </div>
            </section>
        </div>
    </section>
@endsection