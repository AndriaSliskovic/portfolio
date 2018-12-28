<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /*
     * Polja u koja se unose vrednosti
     * */
    protected $fillable = [
        'name',
        'oblast_id'
    ];

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    public function oblast (){
        return $this->belongsTo('App\Oblast');
    }

    public function projekti(){
        return $this->hasMany('App\Projekti');
    }
}
