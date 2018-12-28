<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 08.02.2018.
 * Time: 10.03
 */

namespace App\DataTransferObject;


use App\Projekti;
use Illuminate\Http\Request;

class ProjektiDTO extends AbstractDTO
{
    // *A - na ovaj nacin preko konstruktora apstr. klase su poslate vrednosti za propertije
public $naslov;
public $slug;
public $podnaslov;
public $sadrzaj;
public $vremeIzrade;
public $skill;
public $tag_id;
public $category_id;
public $linkProjekta;
public $linkGitHuba;
public $test;

    protected $dates = ['vremeIzrade'];

    public function __construct(Request $request)
    {
        parent::__construct($request);

        $this->dtoData();
        $this->slug=str_slug($this->naslov);
    }

    public function dtoData(){
        $this->data=[
            'model'=>$this->getModelClass(),
            'modelDTO'=>ProjektiDTO::class,
            'routeName'=>'projekti',
            'viewPath'=>'CRUD.projekti',
            'naslov'=>'Predstavljeni projekti',
            'defaultImage'=>'uploads/projekti/default.png',
        ];
        return $this->data;
    }

    //Podaci za sliku
    public function dtoImage(){
        $this->image=[
            'name'=>'slika',
            'directory'=>'uploads/projekti',
            'rules'=>null,
            'maxSize'=>null,
            'messages'=>null
        ];
        return $this->image;
    }

    public function getRules()
    {
        return [
            'naslov'=>'required|min:2|max:60',
            'podnaslov'=>'required|min:2|max:100',
            'sadrzaj'=>'required|min:2',
//            'linkProjekta'=>'required|min:2|max:100',
//            'linkGitHuba'=>'required|min:2|max:100',
//            'test'=>'required|min:2|max:160',
        ];
    }

    public function getModelClass()
    {
        return Projekti::class;
    }

    public function getErrorMessages()
    {
        $greske=[
            'naslov.required'=>'Potrebno je uneti naslov',
            'naslov.min'=>'naslov mora imati minimalno 2 karaktera',
            'naslov.max'=>'naslov ne moze imati vise od 60 karaktera',
            'podnaslov.required'=>'Potrebno je uneti podnaslov',
            'podnaslov.min'=>'podnaslov mora imati minimalno 2 karaktera',
            'podnaslov.max'=>'podnaslov ne moze imati vise od 100 karaktera',
            'sadrzaj.required'=>'Potrebno je uneti sadrzaj',
            'sadrzaj.min'=>'sadrzaj mora imati minimalno 2 karaktera',

        ];
        return $greske;
    }

    public function porukaSuccess(){
        return 'Uspesno kreiran projekat';
    }

}