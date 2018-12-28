@extends('layouts.adminIndex')

@component('CRUD.komponente.projekatKomponente')
    {{--Sve sto ide izmedju component i endcomponent je slot--}}
    {{$naslov}}
@endcomponent
@push('vendori_css')
    {{--SUMMERNOTE--}}
    <link rel="stylesheet" href="{{asset('summernote-0.8.9-dist/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('summernote-0.8.9-dist/summernote.css')}}">
    {{--SELECT2--}}
    <link rel="stylesheet" href="{{asset('vendors/bower_components/select2/dist/css/select2.min.css')}}">
@endpush
<!-- FormaZaUnosProjekata -->
@section('create')
    <section id="unosPostova">
        <div class="card col-lg-12">
            <div class="card-header">
                <div class="col-12">
                    <h4>{{$naslov}}</h4>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route($route['storeRoute'])}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label for="naslov">Naslov</label>
                        <input type="text" name="naslov" class="form-control" value="{{old('naslov')}}">
                    </div>
                    <div class="form-group">
                        <label for="podnaslov">podnaslov</label>
                        <input type="text" name="podnaslov" class="form-control" value={{old('podnaslov')}}>
                    </div>
                    <div class="form-group" >
                        <label for="sadrzaj">Sadržaj projekta</label>

                        <textarea class="form-control textarea-autosize" placeholder="Ovde treba ubaciti sadrzaj projekta" style="overflow: hidden; word-wrap: break-word; height: 81px;" name="sadrzaj" id="summernote">
                        {{--Sadrzaj text area--}}
                            {{--{!! $var->sadrzaj !!}--}}
                    </textarea>

                    </div>
                    <div class="form-group">
                        <label for="featured">Ubaci sliku</label>
                        <input type="file" name="slika" class="form-control">
                    </div>
                    <!-- Pocetak kolone -->
                    <div class="row">
                        <!-- Select tag -->
                        <div class="col-sm-3">
                            <h3 class="card-body__title">Odaberite pretežnu kategoriju</h3>

                            <div class="form-group">
                                <div class="select">
                                    {{Form::select('category_id',$category,null,['class'=>"form-control"])}}
                                </div>
                            </div>
                        </div>
                        <!-- CheckBoxevi za tagove-->
                        <div class="checkbox">
                            @foreach($tags as $obj)
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" value="{{$obj['id']}}" name="tags[]" class="custom-control-input" value={{old('tags[]')}}>
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">{{$obj['tag']}}</span>
                                </label>
                            @endforeach
                        </div>
                        <!-- EndOfCheckBoxevi -->

                    </div>
                    <div class="row d-flex justify-content-around">
                        <div class="form-group">
                            <label for="skill">Skill</label>
                            <input type="number" name="skill" class="form-control" value="{{old('skill')}}">
                        </div>
                        <div class="form-group">
                            <label for="vremeIzrade">Vreme izrade</label>
                            <input type="date" name="vremeIzrade" class="form-control" value="{{old('vremeIzrade')}}">
                        </div>
                    </div>

{{--                    <div class="form-group">
                        <input type="hidden" name="user_id" class="form-control" value="7">
                        <input type="hidden" name="_token" value="">
                    </div>--}}

                    <div class="form-group">
                        <label for="linkProjekta">linkProjekta</label>
                        <input type="text" name="linkProjekta" class="form-control" value={{old('linkProjekta')}}>
                    </div>
                    <div class="form-group">
                        <label for="linkGitHuba">linkGitHuba</label>
                        <input type="text" name="linkGitHuba" class="form-control" value={{old('linkGitHuba')}}>
                    </div>
                    <div class="form-group">
                        <label for="test">link Testa</label>
                        <input type="text" name="test" class="form-control" value={{old('test')}}>
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            @component('CRUD.komponente.submitGrupa')
                            @endcomponent
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    @push('vendori_js')
        {{--<!-- include SUMMERNOTE css/js-->--}}
        <script src="{{asset('vendors/bower_components/bootstrap/dist/js/bootstrap.js')}}"></script>
        <script src="{{asset('summernote-0.8.9-dist/summernote.js')}}"></script>
        {{--SELECT2--}}
        <script src="{{asset('vendors/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    @endpush
    @push('skripte_js')
        {{--Summernote--}}
        <script>
            $(document).ready(function() {
                $('#summernote').summernote();
                //assign the variable passed from controller to a JavaScript variable.
                {{--var content ={!! json_encode($var->sadrzaj)!!};--}}

                //set the content to summernote using `code` attribute.
                $('#summernote').summernote('code', content);
            });
        </script>
    @endpush
@endsection
<!-- EndOfFormaZaUnosPostova -->