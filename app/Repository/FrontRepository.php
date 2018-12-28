<?php

namespace App\Repository;

use App\Category;
use App\Oblast;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Projekti;
use App\Owner;
use App\Services\SearchKeyword;
use Illuminate\Http\Request;

class FrontRepository
{


    public function sviProjekti(){
        return Projekti::all();
    }

    public function paginateProjekti(){
        $projekti=Projekti::orderBy('skill','decs')->paginate(3);
        return $projekti;
    }

    public static function findBySlug($slug)
    {
        return Projekti::where('slug', $slug)->first();
    }

    public static function owner(){
        return Owner::first();
    }

    public function tagovi($slug){
        $projekat=Projekti::where('slug', $slug)->first();
        $tagovi=$projekat->tag;
        return $tagovi;
    }

    public function kategorije($slug){
        $projekat=Projekti::where('slug', $slug)->first();
        $kategorija=$projekat->category->name;
        return $kategorija;
    }
    public  function oblastProjekta($slug){
        $projekat=Projekti::where('slug', $slug)->first();
        $oblastId=$projekat->category->oblast->id;
        return $oblastId;
    }

    public static function searchKeyword($request,$model,$keyword){
        //dd($request);
        $kolone=['naslov','sadrzaj','podnaslov'];
        $niz=array();
        if(sizeof($kolone)>1){
            for ($x = 1; $x < sizeof($kolone); $x++) {
                $upit = $model::where($kolone[0], 'like', '%' . $keyword . "%")
                    ->orWhere($kolone[$x], 'like', '%' . $keyword . "%")->get();
                array_push($niz,$upit);
                //$niz[]=$upit;

            }
        }   else{
            $upit = $model::where($kolone[0], 'like', '%' . $keyword . "%");
        }
        return $upit;
    }

    public function oblastProjects($id){
        //Sortiranje po skillu
        $projekti=Oblast::find($id)->projekti
        ->sortByDesc('skill')->values()->all();
        return $projekti;
    }

    public function oblastCategories($id){
        return Oblast::find($id)->categories;
    }

    public function projektiPoKategoriji($id){
        return Category::find($id)->projekti;
    }

    public function kategorijaProjekata($id){
        return Category::find($id);
    }

    public function odabranaOblast($id){
        return Oblast::find($id)->name;
    }

    public function redirectToUrl($url){
        return redirect()->away($url);
    }


}