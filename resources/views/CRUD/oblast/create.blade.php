@extends('layouts.adminIndex')

@component('CRUD.komponente.projekatKomponente',[
    'title'=>$naslov
    ])
@endcomponent
@section('create')
    <section id="create">

        <div class="card col-lg-6">
            <!-- Card Header -->
            <div class="card-header row justify-content-between">
                <div class="col-8">
                    <h4>{{$naslov}}</h4>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route($route['storeRoute'])}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                     <div class="form-group">
                        <input type="text" class="form-control input-sm" placeholder="Naziv oblasti" name="name" value="{{old('name')}}">
                        <i class="form-group__bar"></i>
                    </div>
                    <div class="form-group">
                        @component('CRUD.komponente.submitGrupa')
                        @endcomponent
                    </div>
                    </form>
            </div>
        </div>
    </section>
@endsection