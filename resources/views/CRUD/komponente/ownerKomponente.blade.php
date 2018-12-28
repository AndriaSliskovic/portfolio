{{--Naslov --}}
@section('naslov')
    <header class="content__title">
        <h3>{{$slot}}</h3>
    </header>
@endsection

@section('default')
    <h3>CRUD - Admin Dashboard</h3>
@endsection

@section('sidebar')
    <section id="owner">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{route('owner.index')}}">Opšti podaci</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('skill.index')}}">Veštine</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('settings.index')}}">Settings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('menu.index')}}">Menu</a>
            </li>
        </ul>
    </section>
@endsection