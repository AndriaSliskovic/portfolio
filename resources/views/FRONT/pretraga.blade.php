@extends('layouts.frontIndex')

@component('FRONT.frontKomponente',[
    'title'=>$naslov,

    ])
@endcomponent
@section('sadrzaj')
    <section class="content">
        <div class="content__inner">

        <div class="col-md-12">
            {{ $projekti->appends(['keyword' => $_GET['keyword']])->links() }}
        </div>
        <div class="offers col-lg-12">

            <div class="row">
                    @if(count($projekti))
                    @foreach($projekti as $projekat)
                        <!-- Card-->
                            <div class="card col-xl-4 col-lg-4 col-sm-6 col-6">
                                <a href="{{route('single',['slug'=>$projekat->slug])}}" title="">
                                    <div class="card-header_1 text-center"><h4 class="card-title_1">{{$projekat->naslov}}</h4>
                                    </div>
                                    <img class="card-img-top" src="{{asset($projekat->slika)}}">
                                </a>
                                <div class="card-body_1">
                                    <a href="{{route('single',['slug'=>$projekat->slug])}}"><h6 class="card-subtitle_1">{{$projekat->podnaslov}}</h6></a>
                                    <p>{{$projekat->sadrzaj}}</p>
                                </div>
                                <a href="{{route('single',['slug'=>$projekat->slug])}}" class="card-link_1 read-more">Više o projektu ...</a>
                            </div>
                    @endforeach
                    <!-- EndOfCard -->

                @else
                    <p class="lead">Pretraga nije vratila ni jednu objavu.</p>
                @endif
            </div>

        </div>
        </div>
    </section>

@endsection