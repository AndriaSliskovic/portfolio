<?php

namespace App\DataTransferObject;

use App\Tag;
use Illuminate\Http\Request;

class TagsDTO extends AbstractDTO
{
    // Na ovaj nacin preko konstruktora apstr. klase su poslate vrednosti za propertije
    // Ne smeju se dodavati drugi property
    public $tag;
    public $projekat_id;
    public $oblast_id;
    public $opis;

    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->dtoData();
    }

    public function dtoData(){
        $this->data=[
            'model'=>$this->getModelClass(),
            'modelDTO'=>TagsDTO::class,
            'routeName'=>'tagovi',
            'viewPath'=>'CRUD.tag',
            'naslov'=>'Podaci o tagovima',
        ];
        return $this->data;
    }
    public function dtoImage(){

        return null;
    }

    public function getRules()
    {
        return [
            'tag' => 'required'
        ];
    }

    public function getModelClass()
    {
        return Tag::class;
    }

    public function getErrorMessages()
    {
        $greske=[
            'tag.required' => 'Morate uneti tag'
        ];
        return $greske;
    }

    public function porukaSuccess(){
        return 'Uspesno kreiran Tag';
    }
}