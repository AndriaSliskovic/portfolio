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
                    <input type="text" class="form-control input-sm" placeholder="Naziv taga" name="tag" value="{{$var->tag}}">
                    <i class="form-group__bar"></i>
                </div>
                {{--<!-- Select tag -->--}}
                <div class="col-sm-6">
                    {{Form::label('category', 'Izaberi pretežnu oblast taga')}}
                    <div class="form-group">
                        <div class="select">
                            {{Form::select('oblast_id',$oblast,null,['class'=>"form-control"])}}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control input-sm" placeholder="opis taga" name="opis" value="{{$var->opis}}">
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