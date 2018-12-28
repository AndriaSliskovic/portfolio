@extends('layouts.index')

@component('pocetna.components.homeKomponente',[
    'title'=>$naslov,
    'owner'=>$owner
    ])
@endcomponent

    <!-- Contents -->
@section('sadrzaj')
    <section class="content">
        <div class="content__inner">
            <header class="content__title">
                <!-- Jumbotron -->
                <div class="jumbotron">
                    <h1 class="display-3">{{$owner->ime.' '.$owner->prezime}}</h1>
                    <p class="lead">dipl. ing. & full stack web developer & QA automation tester</p>
                </div>
                <!-- end Jumbotron -->
                <h1>Stečeno znanje</h1>
                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                    @foreach($skills as $skill)
                        <!-- Progres -->
                            <h4 style="margin-top: 10px">{{$skill->nazivSkilla}}</h4>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: {{$skill->vrednost}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </header>
        </div>
    </section>
@endsection
