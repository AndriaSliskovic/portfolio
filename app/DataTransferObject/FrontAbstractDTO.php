<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 10.04.2018.
 * Time: 08.18
 */

namespace App\DataTransferObject;

use Illuminate\Http\Request;
use App\Menu;
use App\Settings;
use App\Services\UploadPicture;

abstract class FrontAbstractDTO
{


    //POCETNO PODESAVANJA SAJTA
    public function setData(){
        $this->data['logo']='Portfolio početna';
        $this->data['sadrzaj']='defaultSadrzaj';
        $this->data['sidebar']='sidebar';
        $this->data['settings']=Settings::first();
        $this->data['navBar']=Menu::all();
        return $this->data;
    }



    public abstract function dtoData();
    public  abstract function searchCol();
}