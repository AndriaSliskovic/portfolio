<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{

    /*
     * Polja u koja se unose vrednosti
     * */
    protected $fillable = [
        'nazivSkilla',
        'vrednost'
    ];

}
