@extends('layouts.adminIndex')

@component('CRUD.komponente.ownerKomponente',[
    'title'=>$naslov
    ])
@endcomponent

<!-- Opsti podaci -->
@section('index')
    <section id="owner">
        <div class="card col-lg-6">
            <div class="card-header">
                <div class="col-12">
                    <div class="row">
                    <h4>{{$naslov}}</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {{Form::model($var, ['route' =>['owner.update', $var->id], 'method' => 'PUT','files' => true])}}
                {{ csrf_field() }}
                <div class="form-group col-lg-8">
                    <label for="ime">Ime</label>
                    <input type="text" class="form-control input-sm" placeholder="Ime" name="ime" value="{{$var->ime}}">
                    <i class="form-group__bar"></i>
                </div>
                <div class="form-group col-lg-8">
                    <label for="prezime">prezime</label>
                    <input type="text" class="form-control input-sm" placeholder="Prezime" name="prezime" value="{{$var->prezime}}">
                    <i class="form-group__bar"></i>
                </div>
                {{--Kontejner--}}
                <div class="container col-lg-12">
                    <div class="row">

                        <div class="col-lg-6">
                            <div class="form-group col-lg-12">
                                <label for="datRodjenja">Datum Rodjenja</label>
                                <input type="date" class="form-control input-sm" placeholder="Datum rođenja" name="datRodjenja" value="{{$var->datRodjenja}}">
                                <i class="form-group__bar"></i>
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="mesto">mesto</label>
                                <input type="text" class="form-control input-sm" placeholder="Mesto" name="mesto" value="{{$var->mesto}}">
                                <i class="form-group__bar"></i>
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="iskustvo">Iskustvo</label>
                                <input type="text" class="form-control input-sm" placeholder="Iskustvo" name="iskustvo" value="{{$var->iskustvo}}">
                                <i class="form-group__bar"></i>
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="slika">Izaberite profilnu sliku</label>
                                <input type="file" name="slika" class="form-control">
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                        <div class="row align-items-end">
                        <div class="col-lg-6 ">
                            <img src="{{$var->slika }}" alt="profilnaSlika" class="rounded mx-auto d-block " style="width:128px;height:158px;margin-bottom: 5px; padding-bottom: 15px;padding-left: 15px;" />
                        </div>
                        </div>
                    </div>
                </div>
                {{--Krak kontejnera--}}
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-warning" type="submit">
                            Izmeni podatke
                        </button>
                    </div>
                </div>
            {{ Form::close() }}
            </div>
        </div>
    </section>
@endsection
<!-- End Opsti podaci -->

{{----}}