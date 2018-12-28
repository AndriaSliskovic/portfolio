@extends('layouts.adminIndex')

@component('CRUD.komponente.projekatKomponente',[
    'title'=>$naslov
    ])
@endcomponent

@push('vendori_css')
    {{--SUMMERNOTE--}}
    <link rel="stylesheet" href="{{asset('summernote-0.8.9-dist/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('summernote-0.8.9-dist/summernote.css')}}">
    {{--SELECT2--}}
    <link rel="stylesheet" href="{{asset('vendors/bower_components/select2/dist/css/select2.min.css')}}">
    @endpush

{{--<!-- FormaZaIzmenuProjekata -->--}}
@section('edit')
    <section id="editPostova">
        <div class="card col-lg-12">
            <div class="card-header">
                <div class="col-12">
                    <h4>{{$naslov}}</h4>
                </div>
            </div>
            <div class="card-body">
                {{--<form action="{{route('projekti.update',['id'=>$var->id])}}" method="POST" enctype="multipart/form-data" >--}}
                {{--@method('PUT')--}}
                {{Form::model($var, ['route' =>[$route['updateRoute'], $var->id], 'method' => 'put','files'=>true])}}
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="naslov">Naslov</label>
                    <input type="text" name="naslov" class="form-control" value="{{$var->naslov}}">
                </div>
                <div class="form-group">
                    <label for="podnaslov">podnaslov</label>
                    <input type="text" name="podnaslov" class="form-control" value="{{$var->podnaslov}}">
                </div>
                <div class="form-group" >
                    <label for="sadrzaj">Sadržaj projekta</label>

                    <textarea class="form-control textarea-autosize" placeholder="Ovde treba ubaciti sadrzaj projekta" style="overflow: hidden; word-wrap: break-word; height: 81px;" name="sadrzaj" id="summernote">
                        {{--Sadrzaj text area--}}
                        {!! $var->sadrzaj !!}
                    </textarea>

                </div>
                <div class="form-group">
                    <label for="featured">Ubaci sliku</label>
                    <input type="file" name="slika" class="form-control">
                </div>
                {{----}}
                <div class="row">
                    {{--<!-- Select tag -->--}}
                    <div class="col-sm-3">
                        {{Form::label('category', 'Izaberi kategoriju')}}
                        <div class="form-group">
                            <div class="select">
                                {{Form::select('category_id',$category,null,['class'=>"form-control"])}}
                            </div>
                        </div>
                    </div>
                    {{--<!-- CheckBoxevi za tagove-->--}}
                    <div class="checkbox">
                        @foreach($tags as $obj)
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" value="{{$obj['id']}}" name="tag[]" class="custom-control-input"
                                       @foreach($var->tag as $tag)
                                       @if($obj->id==$tag->id)
                                       checked
                                        @endif
                                        @endforeach
                                >
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">{{$obj['tag']}}</span>
                            </label>
                        @endforeach
                    </div>
                    {{--<!-- EndOfCheckBoxevi -->--}}
                </div>
                <div class="row d-flex justify-content-around">
                    <div class="form-group">
                        <label for="skill">Skill</label>
                        <input type="number" name="skill" class="form-control" value="{{$var->skill}}">
                    </div>
                    <div class="form-group">
                        <label for="vremeIzrade">Vreme izrade</label>
                        <input type="date" name="vremeIzrade" class="form-control" value="{{$var->vremeIzrade}}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="linkProjekta">linkProjekta</label>
                    <input type="text" name="linkProjekta" class="form-control"  value="{{$var->linkProjekta}}">
                </div>
                <div class="form-group">
                    <label for="linkGitHuba">linkGitHuba</label>
                    <input type="text" name="linkGitHuba" class="form-control"  value="{{$var->linkGitHuba}}">
                </div>
                <div class="form-group">
                    <label for="test">link test aplikacije</label>
                    <input type="text" name="test" class="form-control" value="{{$var->test}}">
                </div>
                <div class="form-group">
                    @component('CRUD.komponente.submitGrupa')
                    @endcomponent
                </div>
                {{--</form>--}}
                {{ Form::close() }}
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
                var content ={!! json_encode($var->sadrzaj)!!};

                //set the content to summernote using `code` attribute.
                $('#summernote').summernote('code', content);
            });
        </script>
    @endpush
@endsection
{{--<!-- EndOfFormaZaIzmenuProjekata -->--}}