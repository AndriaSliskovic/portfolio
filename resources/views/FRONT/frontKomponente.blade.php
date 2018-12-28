{{--Komponente koje su zajednicke za sve Projekte--}}
{{--Naslov --}}
@section('naslov')
    {{--<header class="content__title">--}}
        {{--<h3>{{$slot}}</h3>--}}
    {{--</header>--}}
@endsection

@section('defaultSadrzaj')
    <h3>Home Dashboard</h3>
@endsection

@section('sidebar')
<section id="homeSideBar">
    <!-- Sidebar -->
    <aside class="sidebar col-lg-4">
        <div class="scrollbar-inner">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$owner->ime.' '.$owner->prezime}}</h4>
                    <a href="..." class="text-center">
                        <div class="col-4">
                            <img src="{{$owner->slika }}" alt="profilnaSlika" class="rounded mx-auto d-block" style="width:128px;height:158px;margin-bottom: 5px;" />
                        </div>
                    </a>
                    <table class="table table-sm">
                        <tbody>
                        <tr>
                            <td>email :</td>
                        </tr>
                        <tr>
                            <td class="align-middle">{{$owner->email}}</td>
                        </tr>
                        <tr>
                            <td>Telefon :</td>
                        </tr>
                        <tr>
                            <td class="align-middle">064-1304128</td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </aside>
</section>
@endsection
@section('header')
    {{--SERCH----------------------------------------------------------------------}}
    <div class="p-2">
        <form class="search">
            <div class="search__inner">
                <form action="{{ route("pretraga") }}" method="get">
                <input type="text" class="search__text" placeholder="Pretraži ..." name="keyword">
                <i class="zmdi zmdi-search search__helper" data-sa-action="search-close"></i>
                </form>
            </div>
        </form>
    </div>
    {{---------------------------------------------------------------------------------}}
    {{--End Search--}}

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