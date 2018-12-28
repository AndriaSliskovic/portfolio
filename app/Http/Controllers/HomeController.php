<?php

namespace App\Http\Controllers;
use App\Services\ModelManager;
use Illuminate\Http\Request;
use App\DataTransferObject\HomeDTO;

class HomeController extends Controller
{
    private $data;
    private $instance;
    private $klasa=HomeDTO::class;

    public function __construct(Request $request)
    {
        $this->instance=new ModelManager($request,$this->klasa);
        $this->data=$this->instance->getData($this->klasa);
        $this->data['settings']->theme=7;
    }

    public function index(){
        $this->view='pocetna.pocetna';
        return view($this->view,
            $this->data
        );
    }


    public function login(){
        $this->view='auth.login';
        return view($this->view,
            $this->data
        );
    }



}
