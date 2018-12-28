{{--Komponente koje su zajednicke za sve Projekte--}}
{{--Naslov --}}
@section('naslov')
    <header class="content__title">
        {{--<h3>{{$slot}}</h3>--}}
    </header>
@endsection

@section('defaultSadrzaj')
    <h3>Home Dashboard</h3>
@endsection

@section('header')
    <div class="p-2">
        <form class="search">
            <div class="search__inner">
                <input type="text" class="search__text" placeholder="Search ...">
                <i class="zmdi zmdi-search search__helper" data-sa-action="search-close"></i>
            </div>
        </form>
    </div>

    <!-- Sat -->
    <div class="clock hidden-md-down p-2">
        <div class="time">
            <span class="time__hours"></span>
            <span class="time__min"></span>
            <span class="time__sec"></span>
        </div>
    </div>
<!-- EndOfSat -->
@endsection

@section('sidebar')

    <!-- LeviNav -->
{{--Pretezna kategorija--}}
    <div class="card tags">
        <div class="card-body">
            <h5 class="card-title">Pretežna kategorija</h5>
                <h4>{{$kategorija}}</h4>
        </div>
    </div>
<!-- Tagovi -->
<div class="card tags">
    <div class="card-body">
        <h4 class="card-title">Pripadajući tagovi</h4>
        <div class="tags__body">
            @foreach($tags as $tag)
            <a href="">{{$tag->tag}}</a>
            @endforeach
        </div>
    </div>
</div>
            <!-- EndOfTagovi -->

@endsection