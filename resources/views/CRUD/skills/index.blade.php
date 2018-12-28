@extends('layouts.adminIndex')

@component('CRUD.komponente.ownerKomponente',[
    'title'=>$naslov
    ])
@endcomponent

@section('index')
<section id="index">
    <div class="card col-lg-6">
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
                    <th scope="col">Naziv skilla</th>
                    <th scope="col">Vrednost</th>
                    <th scope="col" class="text-right"></th>
                    <th scope="col" class="text-right"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($var as $obj)
                    <tr >
                        <td class="align-middle">{{$obj->nazivSkilla}}</td>
                        <td class="align-middle">{{$obj->vrednost}}</td>
                        <td scope="col" class="text-right"><a href="#">
                    {{-- editDeleteGrupa--}}
                        @component('CRUD.komponente.editDeleteGrupa',
                        [
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