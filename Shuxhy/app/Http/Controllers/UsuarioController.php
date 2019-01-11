<?php

namespace Shuxhy\Http\Controllers;

use Illuminate\Http\Request;

use Shuxhy\Http\Requests;

use Shuxhy\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input; // Para poder subir archivos e imagenes
use Shuxhy\Http\Requests\UsuarioFormRequest;
use DB;

class UsuarioController extends Controller
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
            $usuarios=DB::table('users')->where('name','LIKE','%'.$query.'%')
            ->orderBy('id','desc')
            ->paginate(7);
            return view('administracion.usuario.index',["usuarios"=>$usuarios,"searchText"=>$query]);
        }
    }

    public function create()
    {
        return view("administracion.usuario.create");
    }

    public function edit($id)
    {
        return view("administracion.usuario.edit",["usuario"=>User::findOrFail($id)]);
    }

    public function update(UsuarioFormRequest $request,$id)  // funcion para editar
    {
        $Usuario=User::findOrFail($id);
        $usuario->name=$request->get('name');
        $usuario->email=$request->get('email');
        $usuario->password=bcrypt($request->get('password'));
        $usuario->update();
        return Redirect::to('administracion/usuario');
        
    }


    public function store (UsuarioFormRequest $request)  // Funcion para crear 
    {
        $usuario=new User;
        $usuario->name=$request->get('name');
        $usuario->email=$request->get('email');
        $usuario->password=bcrypt($request->get('password'));
        $usuario->save();
        return Redirect::to('administracion/usuario');

    }

    public function destroy($id)  // funcion para borrar
    {
        $usuario = DB::table('users')->where('id', '=', $id)->delete();
        return Redirect::to('administracion/usuario');

    }

}
