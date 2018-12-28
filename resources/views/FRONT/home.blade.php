@extends('layouts.index')

@component('FRONT.frontKomponente',[
    'title'=>$naslov,
    'owner'=>$owner
    ])
@endcomponent

@section('sadrzaj')
<!-- Contents -->
<section class="content">
    <div class="content__inner">
        <!-- Kategorija 1 -->
        <section id="projekti">
            {{--<header class="content__title">--}}
                {{--<div class="content__header text-center">--}}
                    {{--<h2>{{$naslov}}</h2>--}}
                {{--</div>--}}
            {{--</header>--}}
            <!-- Page Contents -->
            <div class="row groups">
                <div class="card-deck">
            @foreach($projekti as $projekat)
                <!-- Card-->
                    <div class="card col-xl-4 col-lg-4 col-sm-6 col-6" title="{{$projekat->podnaslov}}" style="height: 32rem;">
                        <a href="{{route('single',['slug'=>$projekat->slug])}}" title="">
                            <div class="card-header_1 text-center"><h4 class="card-title_1">{{$projekat->naslov}}</h4>
                            </div>
                            <img class="card-img-top" src="{{asset($projekat->slika)}}">
                        </a>
                        <div class="card-body_1">
                            <a href="{{route('single',['slug'=>$projekat->slug])}}">
                                <p>{!! $projekat->sadrzaj !!}</p>
                            </a>
                        </div>
                            <a href="{{route('single',['slug'=>$projekat->slug])}}" class="card-link_1 read-more">Više o projektu ...</a>
                    </div>
            @endforeach
            <!-- EndOfCard -->
                </div>
            </div>
            <!-- EndOfRow -->
            <!-- Paginacija -->
            {{$projekti->links('vendor.pagination.bootstrap-4')}}
        </section>
    </div>
</section>
@endsection
