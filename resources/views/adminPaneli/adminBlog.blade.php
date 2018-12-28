@extends('layouts.adminIndex')

<!-- Sidebar -->
@section('sidebar')
            <!-- Sidebar Contents -->
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Napravi novi post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Spisak postova</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Spisak obrisanih postova</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Napravi novu kategoriju</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Spisak kategorija</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Napravi novi tag</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Spisak tagova</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Spisak usera</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Unesite novog usera</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Moj profil</a>
                </li>
            </ul>

@endsection
<!-- EndOfSidebar -->


<!-- Contents -->


        @section('sviPostovi')
        <section id="sviPostovi">
            <div class="card col-lg-12">
                <div class="card-header">Spisak postova</div>
                <div class="card-body">
                    <table class="tabela-admin table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Slika</th>
                            <th scope="col">Naslov</th>
                            <th scope="col">Kategorija</th>
                            <th scope="col">Tag</th>
                            <th scope="col">Izmeni</th>
                            <th scope="col">Obrisi</th>
                        </tr>
                        </thead>
                        <tbody >
                        <tr >
                            <td><img src="img/slike/card/Php-1.png" alt="img/slike/card/default.png" width="90px" height="60px"></td>
                            <td>Neki naslov</td>
                            <td>Kategorija 1</td>
                            <td>Tag 1</td>
                            <td><input class="btn btn-info btn-xs" type="submit" value="Promeni"></td>
                            <td><input class="btn btn-danger btn-xs" type="submit" value="Obrisi"></td>
                        </tr>
                        <tr >
                            <td><img src="img/slike/card/Php-2.png" alt="img/slike/card/default.png" width="90px" height="60px"></td>
                            <td>Neki naslov 2</td>
                            <td>Kategorija 2</td>
                            <td>Tag 2</td>
                            <td><input class="btn btn-info btn-xs" type="submit" value="Promeni"></td>
                            <td><input class="btn btn-danger btn-xs" type="submit" value="Obrisi"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        @endsection

        @section('obrisaniPostovi')
        <section id="obrisaniPostovi">
            <!-- Kartica -->
            <div class="card col-lg-9">
                <div class="card-header">Spisak obrisanih postova</div>
                <div class="card-body">
                    <!-- Tabela -->
                    <table class="tabela-admin table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Slika</th>
                            <th scope="col">Naslov</th>
                            <th scope="col">Restore</th>
                            <th scope="col">Obrisi trajno</th>
                        </tr>
                        </thead>
                        <tbody >
                        <tr >
                            <td><img src="img/slike/card/Php-1.png" alt="img/slike/card/default.png" width="90px" height="60px"></td>
                            <td>Neki naslov</td>
                            <td><input class="btn btn-warning btn-xs" type="submit" value="Restore"></td>
                            <td><input class="btn btn-danger btn-xs" type="submit" value="Obrisi"></td>
                        </tr>
                        <tr >
                            <td><img src="img/slike/card/Php-1.png" alt="img/slike/card/default.png" width="90px" height="60px"></td>
                            <td>Neki naslov</td>
                            <td><input class="btn btn-warning btn-xs" type="submit" value="Restore"></td>
                            <td><input class="btn btn-danger btn-xs" type="submit" value="Obrisi"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        @endsection

        @section('unosPostova')
        <section id="unosPostova">
            <!-- FormaZaUnosPostova -->
            <div class="card col-lg-12">
                <div class="card-header">Unesite zeljeni post</div>
                <div class="card-body">
                    <form action="http://localhost:8000/admin/posts" method="post" enctype="multipart/form-data">
                        <!-- hidden polje -->
                        <div class="form-group">
                            <label for="title">Naslov</label>
                            <input type="text" name="naslov" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="featured">Ubaci sliku</label>
                            <input type="file" name="slika" class="form-control">
                        </div>
                        <!-- Pocetak kolone -->
                        <div class="row">
                            <!-- Select tag -->
                            <div class="col-sm-6">
                                <h3 class="card-body__title">Odaberite kategoriju</h3>

                                <div class="form-group">
                                    <div class="select">
                                        <select class="form-control select_custom">
                                            <option value="1">LAravel 5.4</option>
                                            <option value="2">HTML</option>
                                            <option value="3">CSS</option>
                                            <option value="4">JavaScript</option>
                                            <option value="5">PHP</option>
                                            <option value="6">MYSQL</option>
                                            <option value="7">JQuery</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- CheckBoxevi -->
                            <div class="checkbox">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" value="1" name="tags[]" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Početni</span>
                                </label>
                            </div>
                            <div class="checkbox">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" value="2" name="tags[]" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Srednji</span>
                                </label>
                            </div>
                            <div class="checkbox">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" value="3" name="tags[]" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Napredni</span>
                                </label>
                            </div>
                            <div class="checkbox">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" value="4" name="tags[]" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Specificni</span>
                                </label>
                            </div>
                            <!-- EndOfCheckBoxevi -->

                        </div>
                        <div class="form-group">
                            <label for="content">Sadržaj post</label>

                            <textarea class="form-control textarea-autosize" placeholder="Start pressing Enter to see growing..." style="overflow: hidden; word-wrap: break-word; height: 81px;" id="summernote" name="sadrzajPosta"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="user_id" class="form-control" value="7">
                            <input type="hidden" name="_token" value="pEMr6k7TkQwWLNaoKJ0UPLf1YYG2CNwlQOCXiRHj">
                        </div>
                        <div class="form-group">
                            <div class="text-center">
                                <button class="btn btn-success" type="submit">
                                    Upisi post
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        @endsection
        <!-- EndOfFormaZaUnosPostova -->



        <!-- UpisivanjeKategorija -->
        @section('napraviNovuKategoriju')
        <section id="napraviNovuKategoriju">
            <div class="card col-lg-9">
                <div class="card-header">Dodati novu kategoriju</div>
                <div class="card-body">
                    <form action="#" method="post" >
                        <!-- hidden polje -->
                        <div class="form-group">
                            <label for="title">Ime kategorije</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <div class="text-center">
                                <button class="btn btn-success" type="submit">
                                    Upisi novu kategoriju
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        @endsection
        <!-- EndOfUpisivanjeKategorija -->



        <!-- SpisakKategorija -->
        @section('spisakKategorija')
        <section id="spisakKategorija">
            <div class="card col-lg-9">
                <div class="card-header">Promeni kategoriju</div>
                <div class="card-body">
                    <table class="tabela-admin table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Ime kategorije</th>
                            <th scope="col">Menjanje</th>
                            <th scope="col">Brisanje</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>LAravel 5.4</td>
                            <td>
                                <a href="#" class="btn btn-info btn-xs ">
                                    Promeni
                                </a>
                            </td>
                            <td>
                                <a href="#" class="btn btn-danger btn-xs">
                                    Izbriši
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>HTML</td>
                            <td>
                                <a href="http://localhost:8000/admin/category/edit/2" class="btn btn-info btn-xs ">
                                    Promeni
                                </a>
                            </td>
                            <td>
                                <a href="http://localhost:8000/admin/category/delete/2" class="btn btn-danger btn-xs">
                                    Izbriši
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        @endsection
        <!-- EndOfSpisakKategorija -->


        <!-- NapraviTag -->
        @section('napraviTag')
        <section id="napraviTag">
            <div class="card col-lg-9">
                <div class="card-header">Dodaj tag</div>
                <div class="card-body">
                    <form action="#" method="post" >
                        <!-- hidden polje -->
                        <div class="form-group">
                            <label for="title">Ime taga</label>
                            <input type="text" name="tag" class="form-control">
                        </div>

                        <div class="form-group">
                            <div class="text-center">
                                <button class="btn btn-success" type="submit">
                                    Upisi novi tag
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        @endsection
        <!-- EndOfNapraviTag -->


        <!-- PromeniTag -->
        @section('promeniTag')
        <section id="promeniTag">
            <div class="card col-lg-9">
                <div class="card-header">Promeni tag</div>
                <div class="card-body">
                    <table class="tabela-admin table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Ime taga</th>
                            <th scope="col">Menjanje</th>
                            <th scope="col">Brisanje</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">2</th>
                            <td>Početni</td>
                            <td>
                                <a href="#" class="btn btn-info btn-xs ">Promeni</a>
                            </td>
                            <td>
                                <form method="POST" action="#" accept-charset="UTF-8">
                                    <!-- hidden polje -->
                                    <input class="btn btn-danger btn-xs" type="submit" value="Obrisi">
                                </form>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        @endsection
        <!-- EndOfPromeniTag -->

        <!-- PromeniUsera -->
        @section('promeniUsera')
        <section id="promeniUsera">
            <div class="card col-lg-9">
                <div class="card-header">Promeni usera</div>
                <div class="card-body">
                    <table class="tabela-admin table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Slika</th>
                            <th scope="col">Ime</th>
                            <th scope="col">Ovlascenja</th>
                            <th scope="col">Obrisi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <img src="img/slike/Avatars/66.jpg" alt="" width="60px" height="60px" style="border-radius: 50%;">
                            </td>
                            <td>
                                Admin
                            </td>
                            <td>
                                <a href="http://localhost:8000/admin/user/notAdmin/1" class="btn btn-xs btn-danger">Ukloni ovlascenje</a>
                            </td>
                            <td>
                                <a href="http://localhost:8000/admin/user/delete/1" class="btn btn-xs btn-danger">Obrisi usera</a>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <img src="img/slike/Avatars/85.jpg" alt="" width="60px" height="60px" style="border-radius: 50%;">
                            </td>
                            <td>
                                Mr. Miguel McGlynn
                            </td>
                            <td>
                                <a href="http://localhost:8000/admin/user/admin/2" class="btn btn-xs btn-success">Dodaj ovlascenje</a>
                            </td>
                            <td>
                                <a href="http://localhost:8000/admin/user/delete/2" class="btn btn-xs btn-danger">Obrisi usera</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        @endsection
        <!-- EndOfPromeniUsera -->

        <!-- UnesiUsera -->
        @section('unesiUsera')
        <section id="unesiUsera">
            <div class="card col-lg-9">
                <div class="card-header">Unesite podatke za usera</div>
                <div class="card-body">
                    <form action="#" method="post" >
                        <!-- hidden polje -->
                        <div class="form-group">
                            <label for="imePrezime">Ime i prezime</label>
                            <input type="text" name="imePrezime" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">User name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="avatar">Ubaci sliku</label>
                            <input type="file" name="avatar" class="form-control">
                        </div>
                        <div class="text-center">
                            <input class="btn btn-success btn-xs" type="submit" value="Dodaj usera">
                        </div>
                    </form>
                </div>
            </div>
        </section>
        @endsection
        <!-- EndOfUnesiUsera -->

        <!-- SettingsController -->
        @section('settings')
        <section id="settings">
            <div class="card col-lg-9">
                <div class="card-header">Unesite osnovne podatke</div>
                <div class="card-body">
                    <form action="#" method="post" >
                        <!-- hidden polje -->
                        <div class="form-group">
                            <label for="imeSajta">Ime sajta</label>
                            <input type="text" name="imeSajta" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="adresa">Adresa</label>
                            <input type="text" name="adresa" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="telefon">Telefon</label>
                            <input type="text" name="telefon" class="form-control">
                        </div>
                        <div class="text-center">
                            <input class="btn btn-success btn-xs" type="submit" value="Upisi podatke">
                        </div>
                    </form>
                </div>
            </div>
        </section>
        @endsection
        <!-- EndOfSettings -->


    </div>
</section>
<!-- EndOfContent -->