@extends('layouts.adminIndex')

@component('CRUD.komponente.projekatKomponente',[
    'title'=>$naslov
    ])
@endcomponent

@section('edit')
    <section id="edit">
        <div class="card col-lg-6">
            <!-- Card Header -->
            <div class="card-header row justify-content-between">
                <div class="col-8">
                    <h4>{{$naslov}}</h4>
                </div>
            </div>
            <div class="card-body">
                {{--<form action="#" method="POST" enctype="multipart/form-data">--}}
                {{--{{route('skill.update',['id'=>$post->id])}}--}}
                {{Form::model($var, ['route' =>[$route['updateRoute'], $var->id], 'method' => 'put'])}}
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" class="form-control input-sm" placeholder="Naziv skilla" name="nazivSkilla" value="{{$var->nazivSkilla}}">
                    <i class="form-group__bar"></i>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control input-sm" placeholder="Vrednost skilla" name="vrednost" value="{{$var->vrednost}}">
                    <i class="form-group__bar"></i>
                </div>
                <div class="form-group">
                    @component('CRUD.komponente.submitGrupa')
                    @endcomponent
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </section>
@endsection