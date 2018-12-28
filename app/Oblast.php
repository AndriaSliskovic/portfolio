<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oblast extends Model
{
    protected $fillable=[
        'name'
    ];

    public function tags(){
        return $this->hasMany('App\Tag');
    }

    public function categories(){
        return $this->hasMany('App\Category');
    }

    public function projekti(){
        return $this->hasManyThrough('App\Projekti','App\Category','oblast_id','category_id');
    }


}
