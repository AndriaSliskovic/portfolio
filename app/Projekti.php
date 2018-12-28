<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projekti extends Model
{

    protected $fillable=[
        'naslov',
        'slug',
        'podnaslov',
        'sadrzaj',
        'vremeIzrade',
        'skill',
        'tag_id',
        'category_id',
        'slika',
        'linkProjekta',
        'linkGitHuba',
        'test'
    ];


    public function tag(){
        return $this->belongsToMany('App\Tag');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

/*    public function oblast(){
        return $this->belongsTo('App\Oblast');
    }*/
}
