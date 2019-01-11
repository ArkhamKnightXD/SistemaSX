<?php

namespace Shuxhy\Http\Controllers;

use Illuminate\Http\Request;

use Shuxhy\Http\Requests;
use Shuxhy\Relleno;
use Illuminate\Support\Facades\Redirect;
use Shuxhy\Http\Requests\RellenoFormRequest;
use DB;

class RellenoController extends Controller
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
            $rellenos=DB::table('relleno')->where('nombre','LIKE','%'.$query.'%')
            ->where ('condicion','=','1')
            ->orderBy('IdRelleno','desc')
            ->paginate(7);
            return view('administracion.relleno.index',["rellenos"=>$rellenos,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("administracion.relleno.create");
    }
    public function store (RellenoFormRequest $request)  // Funcion para crear 
    {
        $relleno=new Relleno;
        $relleno->nombre=$request->get('Nombre');
        $relleno->abreviatura=$request->get('Abreviatura');
        $relleno->condicion='1';
        $relleno->save();
        return Redirect::to('administracion/relleno');

    }
    public function show($id)
    {
        return view("administracion.relleno.show",["relleno"=>Relleno::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("administracion.relleno.edit",["relleno"=>Relleno::findOrFail($id)]);
    }
    public function update(RellenoFormRequest $request,$id)  // funcion para editar
    {
        $relleno=Relleno::findOrFail($id);
        $relleno->nombre=$request->get('Nombre');
        $relleno->abreviatura=$request->get('Abreviatura');
        $relleno->update();
        return Redirect::to('administracion/relleno');
    }
    public function destroy($id)  // funcion para borrar
    {
        $relleno=Relleno::findOrFail($id);
        $relleno->condicion='0';
        $relleno->update();
        return Redirect::to('administracion/relleno');
    }

}
