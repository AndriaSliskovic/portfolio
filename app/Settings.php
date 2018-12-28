<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    /*
     * Polja u koja se unose vrednosti
     * */
    protected $fillable = [
        'imeSajta',
        'title',
        'adresa',
        'email',
        'telefon',
        'theme'
    ];

}
