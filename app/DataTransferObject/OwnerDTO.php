<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 08.02.2018.
 * Time: 10.03
 */

namespace App\DataTransferObject;


use App\Owner;
use Illuminate\Http\Request;

class OwnerDTO extends AbstractDTO
{
    // *A - na ovaj nacin preko konstruktora apstr. klase su poslate vrednosti za propertije
    public $ime;
    public $prezime;
    public $datRodjenja;
    public $mesto;
    public $iskustvo;

    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->dtoData();
    }

    public function dtoData(){
        $this->data=[
            'model'=>$this->getModelClass(),
            'modelDTO'=>OwnerDTO::class,
            'routeName'=>'owner',
            'viewPath'=>'CRUD.owner',
            'naslov'=>'Podaci za vlasnika sajta',
        ];
        return $this->data;
    }
    //Podaci za sliku
    public function dtoImage(){
        $this->image=[
            'name'=>'slika',
            'directory'=>'uploads/owner',
            'rules'=>null,
            'maxSize'=>null,
            'messages'=>null,
        ];
        return $this->image;
    }


    public function getRules()
    {
        return [
            'ime' => 'required|min:2|max:60',
            'prezime' => 'required|min:2|max:60',
            'datRodjenja' => 'required',
            'mesto' => 'required',
            'iskustvo'=>'required'

        ];
    }

    public function getModelClass()
    {
        return Owner::class;
    }

    public function getErrorMessages()
    {
        $greske=[
            'ime.required'=>'Potrebno je uneti ime vlasnika',
            'ime.min'=>'Ime mora imati minimalno 2 karaktera',
            'ime.max'=>'Ime ne moze imati vise od 60 karaktera',
            'prezime.required'=>'Potrebno je uneti prezime vlasnika',
            'prezime.min'=>'prezime mora imati minimalno 2 karaktera',
            'prezime.max'=>'prezime ne moze imati vise od 60 karaktera',
            'mesto.required'=>'niste uneli mesto stanovanja',
            'datRodjenja.required'=>'Niste uneli datum rodjenja'

        ];
        return $greske;
    }

}