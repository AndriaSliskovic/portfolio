<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 08.02.2018.
 * Time: 10.03
 */

namespace App\DataTransferObject;


use App\Post;
use Illuminate\Http\Request;

class PostDTO extends AbstractDTO
{
    // *A - na ovaj nacin preko konstruktora apstr. klase su poslate vrednosti za propertije
    public $title;
    public $content;
    public $category_id;
    public $slug;
    public $user_id;

    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->slug=str_slug($this->title);
        $this->dtoData();
    }

    public function dtoData(){
        $this->data=[
            'model'=>$this->getModelClass(),
           // 'modelDTO'=>SkillsDTO::class,
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
            'title' => 'required|min:2|max:60',
            'content' => 'required',
            'category_id' => 'required',

        ];
    }

    public function getModelClass()
    {
        return Post::class;
    }

    public function getErrorMessages()
    {
        $greske=[
            'title.required'=>'Potrebno je uneti naslov posta',
            'title.min'=>'Ime mora imati minimalno 2 karaktera',
            'title.max'=>'Ime ne moze imati vise od 60 karaktera',
            'content.required'=>'Niste uneli nikakav sadržaj za željeni post',
            'category_id.required'=>'Niste uneli kategoriju kojoj odgovara post',

        ];
        return $greske;
    }

   /* public function prosledjeniPodaci()
    {
        return [
            'title'=>$request->naslov,
            'content'=>$request->sadrzajPosta,
            'feature'=>'uploads/post/'.$slika_new_name,
            'category_id'=>$request->category_id,
            'slug'=>str_slug($request->naslov),
            'user_id'=>$request->user_id
        ];
    }*/

    public function porukaSuccess(){
        return 'Uspesno kreiran post';
    }
}