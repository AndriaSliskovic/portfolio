@extends('layouts.adminIndex')

@component('CRUD.komponente.projekatKomponente')
    {{--Sve sto ide izmedju component i endcomponent je slot--}}
    {{$naslov}}
@endcomponent

<!-- Svi postovi -->
@section('index')
    <section id="sviProjekti">
        <div class="card col-lg-12">
            {{--Header kartice--}}
            <div class="card-header row justify-content-between">
                @component('CRUD.komponente.createGrupa',
            ['naslov'=>$naslov,
            'route'=>$route
            ])
                @endcomponent

            </div>
            <div class="card-body">
                <table class="tabela-admin table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Slika</th>
                        <th scope="col">Naslov</th>
                        <th scope="col">Kategorija</th>
                        <th scope="col">Tag</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody >
                    @foreach($var as $obj)
                    <tr >
                        <td><img src="{{asset($obj->slika)}}" alt="slika projekta" width="90px" height="60px"></td>
                        <td class="align-middle">{{$obj->naslov}}</td>
                        <td class="align-middle">{{$obj->category['name']}}</td>
                        <td class="align-middle col-md-3">
                            @foreach($obj->tag as $t)
                            {{$t->tag}}</br>
                            @endforeach
                        </td>
                        <td scope="col" class="text-right align-items-center">
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
<!-- Svi projekti -->