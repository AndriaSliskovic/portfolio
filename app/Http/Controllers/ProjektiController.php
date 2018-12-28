<?php

namespace App\Http\Controllers;



use App\DataTransferObject\ProjektiDTO;
use App\Services\ModelManager;
use Illuminate\Http\Request;
use Session;
use App\Tag;
use App\Repository\AdminRepository;

class ProjektiController extends Controller
{
    private $data;
    private $instance;
    private $klasa=ProjektiDTO::class;


    public function __construct(Request $request)
    {
        //Svi koji nisu admin mogu pristupiti samo index stranici
        $this->middleware('admin',['except'=>['index']]);
        $this->instance=new ModelManager($request);
        $this->data=$this->instance->getData($this->klasa);
        $this->repository= new AdminRepository();
    }
    public function index()
    {   $this->data['user']=\Auth::user();
        $this->view=$this->data['viewPath'].'.index';
        //Ime promenljive koja se salje na view
        $this->data['var']=$this->data['model']::all();
        //dd($this->data['var']);
        $this->data['sadrzaj']='index';
        return view($this->view,
            $this->data
        );
    }

    public function create()
    {
        $this->view=$this->data['viewPath'].'.create';
        $this->data['sadrzaj']='create';
        $this->data['tags']=$this->repository->checkboxTags();
        $this->data['category']=$this->repository->selectCategory();
        return view($this->view,
            $this->data
        );
    }

    public function store(Request $request)
    {
        $var = $this->instance->createModel($this->data['modelDTO']);
        if($request->slika) {
            $this->instance->getImage($request, null, $var,$this->data['modelDTO']);
        }else{
            $var->slika=$this->data['defaultImage'];
        }
        $var->save();
        //Ubacivanje u pivot tabelu
        $var->tag()->attach($request->tags);
        Session::flash('success','Uspesno upisani podaci');
        return redirect()->route($this->data['routeName'].'.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $this->view='CRUD.projekti.edit';
        $this->data['var']=$this->data['model']::find($id);
        $this->data['sadrzaj']='edit';
        $this->data['tags']=$this->repository->checkboxTags();
        $this->data['category']=$this->repository->selectCategory();
        $this->data['oblast']=$this->repository->getOblast($id);
        return view($this->view,
            $this->data
        );
    }

    public function update(Request $request, $id)
    {
        $var = $this->instance->createModel($this->data['modelDTO']);
        if($request->slika) {
            $this->instance->getImage($request, $id, $var,$this->data['modelDTO']);
        }
        $var->id=$id;
        //Ubacivanje u pivot tabelu
        $var->tag()->sync($request->tag);
        //dd($this->data['routeName']);
        $updateNiz=$var->toArray();
        //Mass assignment
        $this->data['model']::where('id',$id)
            ->update($updateNiz);
        Session::flash('success','Uspesno promenjeni podaci');
        return redirect()->route($this->data['routeName'].'.index');
    }

    public function destroy($id)
    {
        $var=$this->data['model']::find($id);
        $var->delete();
        Session::flash('success','Uspesno ste obrisali zapis');
        return redirect()->back();
    }



}
