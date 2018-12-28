@extends('layouts.adminIndex')

@component('CRUD.komponente.ownerKomponente',[
    'title'=>$naslov,
    'route'=>$route,
    ])
@endcomponent
@section('index')
<section id="index">
    <div class="card col-lg-12">
        <!-- Card Header -->
        <div class="card-header row justify-content-between">
            {{--Create Grupa--}}
            @component('CRUD.komponente.createGrupa',
            ['naslov'=>$naslov,
            'route'=>$route
            ])
            @endcomponent

        </div>
        <!--  -->
        <div class="card-body">

            <table class="tabela-admin table table-hover">
                <thead>
                <tr>
                    <th scope="col">Naziv menija</th>
                    <th scope="col">Putanja</th>
                    <th scope="col" class="text-right"></th>
                    <th scope="col" class="text-right"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($var as $obj)
                    <tr >
                        <td class="align-middle">{{$obj->name}}</td>
                        <td class="align-middle">{{$obj->putanja}}</td>
                        <td scope="col" class="text-right"><a href="#">
                            {{-- editDeleteGrupa--}}
                            @component('CRUD.komponente.editDeleteGrupa', [
                            'obj'=>$obj,
                            'route'=>$route
                            ])
                            @endcomponent
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
</section>
@endsection