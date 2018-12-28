<?php

namespace App\DataTransferObject;

use App\Skills;
use Illuminate\Http\Request;

class SkillsDTO extends AbstractDTO
{
    // Na ovaj nacin preko konstruktora apstr. klase su poslate vrednosti za propertije
    // Ne smeju se dodavati drugi property
public $nazivSkilla;
public $vrednost;

    public function __construct(Request $request)
    {
       parent::__construct($request);
        $this->dtoData();
    }

    public function dtoData(){
        $this->data=[
            'model'=>$this->getModelClass(),
            'modelDTO'=>SkillsDTO::class,
            'routeName'=>'skill',
            'viewPath'=>'CRUD.skills',
            'naslov'=>'Podaci o usvojenim veštinama',
        ];
        return $this->data;
    }
    public function dtoImage(){

        return null;
    }

    public function getRules()
    {
        return [
            'nazivSkilla'=>'required|min:2|max:60',
            'vrednost'=>'required|numeric'
        ];
    }

    public function getModelClass()
    {
        return Skills::class;
    }

    public function getErrorMessages()
    {
        $greske=[
            'nazivSkilla.required' => 'Odaberite bar jedan skill',
            'nazivSkilla.min'=>'Naziv skilla mora imati minimalno 2 karaktera',
            'nazivSkilla.max'=>'Naziv skilla ne moze imati vise od 60 karaktera',
            'vrednost.required'=>'Potrebno je uneti zeljenu vrednost',
            'vrednost.numeric'=>'Potrebno je uneti broj za vrednost'
        ];
        return $greske;
    }

}