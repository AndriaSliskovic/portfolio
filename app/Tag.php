<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    /*
     * Polja u koja se unose vrednosti
     * */
    protected $fillable = [
        'tag',
        'projekat_id',
        'oblast_id',
        'opis'
    ];

    public function projekat(){
        return $this->belongsToMany('App\Projekti');
    }

    public function oblast(){
        return $this->belongsTo('App\Oblast');
    }





}
