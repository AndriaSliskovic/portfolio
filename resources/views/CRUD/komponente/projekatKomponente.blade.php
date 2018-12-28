{{--Komponente koje su zajednicke za sve Projekte--}}
{{--Naslov --}}
@section('naslov')
    <header class="content__title">
        <h3>{{$slot}}</h3>
    </header>
@endsection

@section('defaultSadrzaj')
    <h3>CRUD - Admin Dashboard</h3>
@endsection

@section('sidebar')
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active" href="{{route('home')}}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('projekti.index')}}">Projekti</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('tagovi.index')}}">Tagovi</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('kategorije.index')}}">Kategorije</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('oblast.index')}}">Oblasti</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('user.index')}}">Useri</a>
        </li>

    </ul>
@endsection