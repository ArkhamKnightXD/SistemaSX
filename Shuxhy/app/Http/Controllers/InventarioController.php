<?php

namespace Shuxhy\Http\Controllers;

use Illuminate\Http\Request;

use Shuxhy\Http\Requests;
use Shuxhy\Inventario;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input; // Para poder subir archivos e imagenes
use Shuxhy\Http\Requests\InventarioFormRequest;
use DB;

class InventarioController extends Controller
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
            $inventarios=DB::table('inventario as inv')
           // ->join('producto as p', 'inv.IdProducto','=','inv.IdProducto')
            //->join('material as m', 'inv.IdMaterial','=','m.IdMaterial')
            ->select('inv.IdIventario', 'inv.Nombre','inv.CantProducto', 'inv.CantMaterial', 'inv.fecha')
            ->where('inv.Fecha','LIKE','%'.$query.'%')
            ->where ('inv.Condicion','=','1') 
            ->orderBy('inv.CantProducto', 'desc')
            ->paginate(7);
            return view('almacen.inventario.index',["inventarios"=>$inventarios,"searchText"=>$query]);
        }
    }
}
