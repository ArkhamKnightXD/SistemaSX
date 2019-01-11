<?php

namespace Shuxhy\Http\Controllers;

use Illuminate\Http\Request;

use Shuxhy\Http\Requests;
use Shuxhy\Forma;
use Illuminate\Support\Facades\Redirect;
use Shuxhy\Http\Requests\FormaFormRequest;
use DB;

class FormaController extends Controller
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
            $formas=DB::table('forma')->where('nombre','LIKE','%'.$query.'%')
            ->where ('condicion','=','1')
            ->orderBy('IdForma','desc')
            ->paginate(7);
            return view('administracion.forma.index',["formas"=>$formas,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("administracion.forma.create");
    }
    public function store (FormaFormRequest $request)  // Funcion para crear 
    {
        $forma=new Forma;
        $forma->nombre=$request->get('Nombre');
        $forma->abreviatura=$request->get('Abreviatura');
        $forma->condicion='1';
        $forma->save();
        return Redirect::to('administracion/forma');

    }
    public function show($id)
    {
        return view("administracion.forma.show",["forma"=>Forma::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("administracion.forma.edit",["forma"=>Forma::findOrFail($id)]);
    }
    public function update(FormaFormRequest $request,$id)  // funcion para editar
    {
        $forma=Forma::findOrFail($id);
        $forma->nombre=$request->get('Nombre');
        $forma->abreviatura=$request->get('Abreviatura');
        $forma->update();
        return Redirect::to('administracion/forma');
    }
    public function destroy($id)  // funcion para borrar
    {
        $forma=Forma::findOrFail($id);
        $forma->condicion='0';
        $forma->update();
        return Redirect::to('administracion/forma');
    }

}
