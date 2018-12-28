@extends('layouts.index')
@section('naslov')
    <header class="content__title">
        <h3>{{$naslov}}</h3>
    </header>
@endsection

@section('sidebar')
    <section id="homeSideBar">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="scrollbar-inner">

                <!-- Sidebar Contents -->
                <div class="card">
                    <div class="card-body">
                        <a href="{{ asset('pdf/CV_Sliskovic_Andria_0918.pdf') }}" target='_blank' >
                            <h4 class="card-title">Curriculum Vitae</h4>
                        </a>
                    </div>
                </div>

            </div>
        </aside>
    </section>
@endsection


@section('sadrzaj')
    <section class="content" id="osnPodaci">
        <div class="content__inner">
            <div class="card profile">
                <div class="profile__img">
                    <img src="{{$owner->slika}}" alt="profilna slika">

                </div>

                <div class="profile__info">
                    <h3>{{$naslov}} :</h3>
                    <h4>{{$owner->ime}} {{$owner->prezime}}</h4>
                    <p>dipl. ing. & full stack web developer & QA automation tester</p>

                    <ul class="icon-list">
                        <li><i class="zmdi zmdi-phone"></i> 381-641304128</li>
                        <li><i class="zmdi zmdi-email"></i> {{$owner->email}}</li>
                        <li>Mesto rođenja : {{$owner->mesto}}</li>
                    </ul>
                </div>
            </div>


            <div class="content__inner">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-body__title mb-4">Ukratko o  {{$owner->ime}} {{$owner->prezime}}</h4>
                        <div class="listview__content">
                        <div class="listview__heading">
                        <p>2000. godine diplomirao na Mašinskom fakultetu.</p>
                        </div>
                        <div class="listview__heading">
                        <p>Od 1993. sam vlasnik agencije za vođenje poslovnih knjiga.</p>
                        </div>
                        <div class="listview__heading">
                        <p>Od 1996. počeo sam aktivno da se bavim izradom knjigovodstvenih programa, čime se i danas bavim.</p>
                        </div>
                        <div class="listview__heading">
                        <p>2015. godine prateći trendove na tržištu i ubrzani razvoj informacionih i komunikacionih tehnologija odlučio sam da unapredim svoje znanje iz oblasti programiranja i da se posvetim Web developmentu. </p>
                        </div>
                        <div class="listview__heading">
                        <p>2017. godine počeo sam da pohađam individualne časove koje je organizovala firme „Tele trader“ kod prof. dr. Nenada Kojića. Posle intenzivne obuke stekao sam zvanje Full-Stack Developer i softver quality assurance tester za šta posedujem i adekvatne sertifikate .</p>
                        </div>
                    </div>
                        <br>

                        <h4 class="card-body__title mb-4">Contact Information</h4>
                        <ul class="icon-list">
                            <li><i class="zmdi zmdi-phone"></i> 381-641304128</li>
                            <li><i class="zmdi zmdi-email"></i> {{$owner->email}}</li>

                        </ul>
                    </div>
                </div>
            </div>
            </div>

        </div>
    </section>


@endsection