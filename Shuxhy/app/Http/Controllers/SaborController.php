<?php

namespace Shuxhy\Http\Controllers;

use Illuminate\Http\Request;

use Shuxhy\Http\Requests;
use Shuxhy\Sabor;
use Illuminate\Support\Facades\Redirect;
use Shuxhy\Http\Requests\SaborFormRequest;
use DB;

class SaborController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $sabores=DB::table('sabor')->where('nombre','LIKE','%'.$query.'%')
            ->where ('condicion','=','1')
            ->orderBy('IdSabor','desc')
            ->paginate(7);
            return view('administracion.sabor.index',["sabores"=>$sabores,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("administracion.sabor.create");
    }
    public function store (SaborFormRequest $request)  // Funcion para crear 
    {
        $sabor=new Sabor;
        $sabor->nombre=$request->get('Nombre');
        $sabor->abreviatura=$request->get('Abreviatura');
        $sabor->condicion='1';
        $sabor->save();
        return Redirect::to('administracion/sabor');

    }
    public function show($id)
    {
        return view("administracion.sabor.show",["sabor"=>Sabor::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("administracion.sabor.edit",["sabor"=>Sabor::findOrFail($id)]);
    }
    public function update(SaborFormRequest $request,$id)  // funcion para editar
    {
        $sabor=Sabor::findOrFail($id);
        $sabor->nombre=$request->get('Nombre');
        $sabor->abreviatura=$request->get('Abreviatura');
        $sabor->update();
        return Redirect::to('administracion/sabor');
    }
    public function destroy($id)  // funcion para borrar
    {
        $sabor=Sabor::findOrFail($id);
        $sabor->condicion='0';
        $sabor->update();
        return Redirect::to('administracion/sabor');
    }

}
