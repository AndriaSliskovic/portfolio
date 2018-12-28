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
<section id="homeSideBar">
    <!-- Sidebar -->
    <aside class="sidebar col-lg-4">
        <div class="scrollbar-inner">
                <!-- Sidebar Contents -->
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
                                <td>Datum rođenja :</td>
                            </tr>
                            <tr>
                                <td class="align-middle">{{$owner->datRodjenja}}</td>
                            </tr>
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