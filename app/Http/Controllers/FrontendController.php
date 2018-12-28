<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\DataTransferObject\FrontDTO;
use App\Repository\FrontRepository;
use Illuminate\Http\Request;
use App\Services\ModelManager;
use App\Services\SearchKeyword;
use Exception;
use PDF;



class FrontendController extends Controller
{
    private $data;
    private $instance;
    private $klasa=FrontDTO::class;
    private $repository;
    private  $urlCV="https://docs.google.com/document/d/1eNsF_eJKz52ojH0Ydd9I-D-UkeicJQnXLazsK4MnqJ0/edit?usp=sharing";


    public function __construct(Request $request)
    {
        $this->instance=new ModelManager($request,$this->klasa);
        $this->data=$this->instance->getData($this->klasa);
        $this->repository=new FrontRepository();
        $this->data['sadrzaj']='sadrzaj';
        //$this->data['navBar']='header';
        $this->request=$request;
    }

    //Pregled svih projekata
    public function home(){
        //Ispituje da li je izvrsena pretraga
        if ($this->request->has('keyword')){
            $this->search($this->data['model']);
            $this->data['naslov']='Pretraga po ključnoj reči :'.$this->request['keyword'];
        } else{
            $this->data['projekti']=$this->repository->paginateProjekti();
        }
        $this->data['naslov']="Svi predstavljeni projekti";
        $this->data['settings']['theme']=5;
        $view='FRONT.home';
        return view($view,
            $this->data
            );
    }

    //Pojedinacni projekat
    public function single($slug)
    {
        $projekat=FrontRepository::findBySlug($slug);

        $this->view = 'FRONT.single';
        $this->data['navBar']='header';
        if (!$projekat) {
            $view = 'FRONT.404';
        }
        $this->data['projekat'] = $projekat;
        $this->data['owner']=FrontRepository::owner();
        $this->data['projekti']=$this->repository->sviProjekti();
        $this->data['tagovi']=$this->repository->tagovi($slug);
        $this->data['kategorija']=$this->repository->kategorije($slug);
        $this->data['naslov']=$projekat->naslov;
        $this->data['oblastId']=$this->repository->oblastProjekta($slug);
        return view($this->view, $this->data);
    }

    public function search($model)
    {
        //Kolone u tabeli nad kojima se vrsi pretraga - definisane su u DTO-u
        $kolone=new $this->klasa($this->request);
        $kolone=$kolone->searchCol();
        $keyword = $this->request->get('keyword');
        //Koristi servis za pretragu - ima 3 kolone
        $projekti=SearchKeyword::searchByKeywordBy3Col($keyword, true,$model,$kolone);
        $this->data['projekti'] = $projekti;
        return $this->data;

    }

    //Projekti po oblastima
    public function oblastProjekata($id){
        $view='FRONT.oblasti';
        $this->data['logo']="Projekti po oblastima";
        $this->data['oblastProjekti']=$this->repository->oblastProjects($id);
        $this->data['oblastCategories']=$this->repository->oblastCategories($id);
        $naslov="Projekti iz oblasti : ".$this->repository->odabranaOblast($id);
        $this->data['naslov']=$naslov;
        $this->data['settings']->theme=$id;
        return view($view, $this->data);
    }

    public function kategorijaProjekata($id){
        $view='FRONT.kategorijaProjekata';
        $this->data['logo']="Projekti po kategorijama";
        $this->data['projekti']=$this->repository->projektiPoKategoriji($id);
        $this->data['katProjekata']=$this->repository->kategorijaProjekata($id);
        $naslov="Projekti po kategoriji : ".$this->repository->kategorijaProjekata($id)->name;
        $this->data['naslov']=$naslov;
        $oblast_id=$this->repository->kategorijaProjekata($id)->oblast_id;
        $this->data['settings']['theme']=8;
        //Da bi se ponovo ucitao sideBar za odredjenu oblast
        $this->data['oblastCategories']=$this->repository->oblastCategories($oblast_id);
        return view($view, $this->data);

    }

    public function kontakt(){
        $view='FRONT.kontakt';
        $this->data['naslov']="Osnovni podaci";
        $this->data['settings']['theme']=4;
        return view($view, $this->data);
    }

    public function cv(){
        return redirect()->away($this->urlCV);
    }

    public function redirectToUrl($url){
        dd($url);
        return redirect()->away($url);
    }

}
