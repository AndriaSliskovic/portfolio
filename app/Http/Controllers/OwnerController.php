<?php

namespace App\Http\Controllers;



use App\DataTransferObject\OwnerDTO;
use App\Services\ModelManager;
use Illuminate\Http\Request;
use Session;
/*
 * U repositorijumu ProjektiRepository.php su setovani sledeci default podaci:
 * logo , sadrzaj , sidebar , naslov , naslovProjekta
 * */

class OwnerController extends Controller
{

    private $klasa=OwnerDTO::class;
    private $instance;
    private $data;

    public function __construct(Request $request)
    {
        $this->instance=new ModelManager($request,$this->klasa);
        $this->data=$this->instance->getData($this->klasa);
    }

    //IMA SAMO JEDAN VIEW I UPDATE METOD

    public function index()
    {
        $this->view=$this->data['viewPath'].'.owner';
        //Ime promenljive koja se salje na view
        $this->data['var']=$this->data['model']::first();
        $this->data['sadrzaj']='index';
        return view($this->view,
            $this->data
        );
    }


    public function create()
    {
        /*$this->view=$this->data['viewPath'].'.create';
        $this->data['sadrzaj']='create';
        return view($this->view,
            $this->data
        );*/
    }


    public function store(Request $request)
    {
       /* $menager = new ModelManager($request);
        $owner = $menager->createModel(OwnerDTO::class);
        $owner->save();
        Session::flash('success','Uspesno ubaceni podaci');
        return redirect()->route('owner.index');*/
    }



    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        /*$this->view=$this->data['viewPath'].'.edit';
        $this->data['var']=$this->data['model']::find($id);
        $this->data['sadrzaj']='edit';
        return view($this->view,
            $this->data
        );*/
    }


    public function update(Request $request, $id)
    {
        $var = $this->instance->createModel($this->data['modelDTO']);
        if($request->slika) {
            $this->instance->getImage($request, $id, $var,$this->data['modelDTO']);
        }
        $var->id=$id;
        $updateNiz=$var->toArray();
        //Mass assignment
        $this->data['model']::where('id',$id)
            ->update($updateNiz);
        Session::flash('success','Uspesno promenjeni podaci');
        return redirect()->route($this->data['routeName'].'.index');
    }
    public function destroy($id)
    {
        /*$var=$this->data['model']::find($id);
        $var->delete();
        Session::flash('success','Uspesno ste obrisali zapis');
        return redirect()->back();*/
    }
}
