<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    /*
     * Polja u koja se unose vrednosti
     * */
    protected $fillable = [
        'ime',
        'prezime',
        'datRodjenja',
        'mesto',
        'iskustvo',
        'slika'
    ];


}
