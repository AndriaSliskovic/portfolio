<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 03.04.2018.
 * Time: 13.21
 */

namespace App\DataTransferObject;

use Illuminate\Http\Request;
use App\Owner;
use App\Skills;
use App\Projekti;

class FrontDTO extends FrontAbstractDTO
{
    public function __construct(Request $request)
    {
        $this->dtoData();
    }

    public function dtoData(){
        $this->data=[
            'model'=>Projekti::class,
            'modelDTO'=>FrontDTO::class,
            'routeName'=>null,
            'viewPath'=>'FRONT',
            'naslov'=>null,
            'owner'=>Owner::first()
        ];
        return $this->data;
    }

    public function searchCol(){
        $kolone=['naslov','sadrzaj','podnaslov'];
        return $kolone;
    }
}