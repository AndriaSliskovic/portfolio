<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 14.03.2018.
 * Time: 13.47
 */

namespace App\Repository;

use App\DataTransferObject\MenuDTO;
use App\DataTransferObject\SkillsDTO;
use App\Projekti;
use App\Menu;
use App\Settings;
use App\Profile;
use App\Tag;
use App\Category;
use App\Oblast;


class AdminRepository
{
    public function checkboxTags(){
        $tags=Tag::all();
        return $tags;
    }

    public function selectCategory (){
        $category=Category::all()->pluck('name','id')->toArray();
        return $category;
    }

    public function selectOblast (){
        $oblast=Oblast::all()->pluck('name','id')->toArray();
        return $oblast;
    }

    public function getCategoryOblast(){
        $oblast=Category::all();
        return $oblast;
    }

    public function getOblast($id){
        //Pristupanje podacima preko posredne tabele one to many
        $oblast=Projekti::find($id)->category->oblast->name;
        return $oblast;
    }

}