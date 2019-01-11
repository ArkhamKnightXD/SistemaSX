<?php

namespace Shuxhy\Http\Controllers;

use Illuminate\Http\Request;

use Shuxhy\Http\Requests;
use Shuxhy\Topping;
use Illuminate\Support\Facades\Redirect;
use Shuxhy\Http\Requests\ToppingFormRequest;
use DB;

class ToppingController extends Controller
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
            $toppings=DB::table('topping')->where('nombre','LIKE','%'.$query.'%')
            ->where ('condicion','=','1')
            ->orderBy('IdTopping','desc')
            ->paginate(7);
            return view('administracion.topping.index',["toppings"=>$toppings,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("administracion.topping.create");
    }
    public function store (ToppingFormRequest $request)  // Funcion para crear 
    {
        $topping=new Topping;
        $topping->nombre=$request->get('Nombre');
        $topping->abreviatura=$request->get('Abreviatura');
        $topping->condicion='1';
        $topping->save();
        return Redirect::to('administracion/topping');

    }
    public function show($id)
    {
        return view("administracion.topping.show",["topping"=>Topping::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("administracion.topping.edit",["topping"=>Topping::findOrFail($id)]);
    }
    public function update(ToppingFormRequest $request,$id)  // funcion para editar
    {
        $topping=Topping::findOrFail($id);
        $topping->nombre=$request->get('Nombre');
        $topping->abreviatura=$request->get('Abreviatura');
        $topping->update();
        return Redirect::to('administracion/topping');
    }
    public function destroy($id)  // funcion para borrar
    {
        $topping=Topping::findOrFail($id);
        $topping->condicion='0';
        $topping->update();
        return Redirect::to('administracion/topping');
    }

}
