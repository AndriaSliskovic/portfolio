@extends('layouts.adminIndex')
<!-- OwnerController -->
@section('sidebar')
<section id="owner">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active" href="">Opšti podaci</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">Veštine</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">Settings</a>
        </li>
    </ul>
</section>
@endsection
<!-- End OwnerController -->

<!-- Opsti podaci -->
@section('owner')
<section id="owner">
    <div class="card col-lg-6">
        <div class="card-header">Opšti podaci</div>
        <div class="card-body">
            <div class="form-group">
                <input type="text" class="form-control input-sm" placeholder="Ime" name="ime">
                <i class="form-group__bar"></i>
            </div>
            <div class="form-group">
                <input type="text" class="form-control input-sm" placeholder="Prezime" name="prezime">
                <i class="form-group__bar"></i>
            </div>
            <div class="form-group col-lg-3">
                <input type="text" class="form-control input-sm" placeholder="Datum rođenja" name="datRodjenja">
                <i class="form-group__bar"></i>
            </div>
            <div class="form-group col-lg-3">
                <input type="text" class="form-control input-sm" placeholder="Iskustvo" name="iskustvo">
                <i class="form-group__bar"></i>
            </div>
            <div class="form-group col-lg-2">
                <input type="number" class="form-control input-sm" placeholder="settings_id" name="settings_id">
                <i class="form-group__bar"></i>
            </div>
            <div class="form-group col-lg-2">
                <input type="number" class="form-control input-sm" placeholder="skill_id" name="skill_id">
                <i class="form-group__bar"></i>
            </div>
            <div class="form-group">
                <label for="slika">Izaberite profilnu sliku</label>
                <input type="file" name="slika" class="form-control">
                <i class="form-group__bar"></i>
            </div>
        </div>
    </div>
</section>
@endsection
<!-- End Opsti podaci -->


<!-- Skills -->
@section('skills')
<section id="skills">
    <div class="card col-lg-4">
        <div class="card-header">Veštine</div>
        <div class="card-body">
            <div class="form-group">
                <input type="text" class="form-control input-sm" placeholder="HTML" name="name">
                <i class="form-group__bar"></i>
            </div>
            <div class="form-group">
                <input type="text" class="form-control input-sm" placeholder="CSS" name="title">
                <i class="form-group__bar"></i>
            </div>
            <div class="form-group">
                <input type="text" class="form-control input-sm" placeholder="JavaScript" name="dateOfBirth">
                <i class="form-group__bar"></i>
            </div>
            <div class="form-group">
                <input type="text" class="form-control input-sm" placeholder="MySQL" name="address">
                <i class="form-group__bar"></i>
            </div>
            <div class="form-group">
                <input type="text" class="form-control input-sm" placeholder="PHP" name="email">
                <i class="form-group__bar"></i>
            </div>
            <div class="form-group">
                <input type="text" class="form-control input-sm" placeholder="Laravel" name="laravel">
                <i class="form-group__bar"></i>
            </div>
            <div class="form-group">
                <input type="text" class="form-control input-sm" placeholder="React" name="react">
                <i class="form-group__bar"></i>
            </div>
        </div>
    </div>
</section>
@endsection
<!-- End Skills -->



<!-- SettingsController -->
@section('settings')
<section id="settings">
    <div class="card col-lg-6">
        <div class="card-header">Podešavanja</div>
        <div class="card-body">
            <div class="form-group">
                <input type="text" class="form-control input-sm" placeholder="Ime sajta" name="imeSajta">
                <i class="form-group__bar"></i>
            </div>
            <div class="form-group">
                <input type="text" class="form-control input-sm" placeholder="Adresa" name="adresa">
                <i class="form-group__bar"></i>
            </div>
            <div class="form-group">
                <input type="text" class="form-control input-sm" placeholder="Email" name="email">
                <i class="form-group__bar"></i>
            </div>
            <div class="form-group">
                <input type="text" class="form-control input-sm" placeholder="Telefon" name="telefon">
                <i class="form-group__bar"></i>
            </div>
            <div class="form-group">
                <input type="text" class="form-control input-sm" placeholder="Theme" name="theme">
                <i class="form-group__bar"></i>
            </div>
        </div>
    </div>
</section>
@endsection
<!-- End SettingsController -->