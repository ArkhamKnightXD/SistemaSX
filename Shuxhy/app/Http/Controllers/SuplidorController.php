<?php

namespace Shuxhy\Http\Controllers;

use Illuminate\Http\Request;

use Shuxhy\Http\Requests;
use Shuxhy\Suplidor;
use Illuminate\Support\Facades\Redirect;
use Shuxhy\Http\Requests\SuplidorFormRequest;
use DB;

class SuplidorController extends Controller
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
            $suplidores=DB::table('suplidor')->where('Compania','LIKE','%'.$query.'%')
            ->where ('condicion','=','1')
            ->orderBy('IdSuplidor','desc')
            ->paginate(7);
            return view('almacen.suplidor.index',["suplidores"=>$suplidores,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("almacen.suplidor.create");
    }
    public function store (SuplidorFormRequest $request)  // Funcion para crear 
    {
        $suplidor=new Suplidor;
        $suplidor->compania=$request->get('Compania');
        $suplidor->nombrecontacto=$request->get('NombreContacto');
        $suplidor->direccion=$request->get('Direccion');
        $suplidor->telefono=$request->get('Telefono');
        $suplidor->comentario=$request->get('Comentario');
        $suplidor->condicion='1';
        $suplidor->save();
        return Redirect::to('almacen/suplidor');

    }
    public function show($id)
    {
        return view("almacen.suplidor.show",["suplidor"=>Suplidor::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("almacen.suplidor.edit",["suplidor"=>Suplidor::findOrFail($id)]);
    }
    public function update(SuplidorFormRequest $request,$id)  // funcion para editar
    {
        $suplidor=Suplidor::findOrFail($id);
        $suplidor->compania=$request->get('Compania');
        $suplidor->nombrecontacto=$request->get('NombreContacto');
        $suplidor->direccion=$request->get('Direccion');
        $suplidor->telefono=$request->get('Telefono');
        $suplidor->comentario=$request->get('Comentario');
        $suplidor->update();
        return Redirect::to('almacen/suplidor');
    }
    public function destroy($id)  // funcion para borrar
    {
        $suplidor=Suplidor::findOrFail($id);
        $suplidor->condicion='0';
        $suplidor->update();
        return Redirect::to('almacen/suplidor');
    }

}
