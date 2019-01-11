<?php

namespace Shuxhy\Http\Controllers;

use Illuminate\Http\Request;

use Shuxhy\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Input; // Para poder subir archivos e imagenes
use Shuxhy\Http\Requests\ProduccionFormRequest;
use Shuxhy\Produccion;
use Shuxhy\Producto;
use Shuxhy\Receta;
use DB;

use Carbon\Carbon;
use Response; 
use Illuminate\Support\Collection;



class ProduccionController extends Controller
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
            $producciones=DB::table('produccion as pro')
             ->join('receta as r', 'pro.IdReceta','=','r.IdReceta')
             ->join('detallereceta as dr', 'r.IdReceta','=','dr.IdReceta')
             ->join('producto as p', 'pro.IdProducto','=','p.IdProducto')
            ->select('pro.IdProduccion', 'pro.CantidadFaltante', 'pro.CantidadProducir', 'pro.CantidadProducida','pro.Comentario', 'pro.Condicion','pro.Fecha', 'pro.Estatus', 'p.Nombre', 'p.Descripcion', 'p.IdProducto')
            ->where('pro.CantidadFaltante','LIKE','%'.$query.'%')
            ->where ('pro.Condicion','=','1') 
            ->orderBy('pro.IdProduccion', 'desc')
            ->paginate(7);
            return view('almacen.produccion.index',["producciones"=>$producciones,"searchText"=>$query]);

        }
    }


     public function create() // Lo que me falla debe de ser el script
    {
        

        $recetas=DB::table('receta as r')
       ->join('detallereceta as dr', 'r.IdReceta','=','dr.IdReceta')
       ->join('material as mat', 'dr.IdMaterial','=','mat.IdMaterial')
        ->select(DB::raw('CONCAT(r.Nombre, " ", r.Descripcion ) AS receta'),'r.IdReceta', 'r.Porcion')
        ->where('r.Condicion','=','1')
        ->get();


        $productos=DB::table('producto as prod')
        ->select(DB::raw('CONCAT(prod.Nombre, " ", prod.Descripcion ) AS producto'),'prod.IdProducto')
        ->where('prod.Condicion','=','1')
        ->get();



              
        return view('almacen.produccion.create',["recetas"=>$recetas,"productos"=>$productos]);

    }
    public function store (ProduccionFormRequest $request)  // Funcion para crear 
    {

        try 
        {
       
        $produccion=new Produccion;
        $produccion->IdReceta=$request->get('IdReceta');
        $produccion->IdProducto=$request->get('IdProducto');
        $produccion->Estatus=$request->get('Estatus');
        $mytime=Carbon::now('America/Santo_Domingo');
        $produccion->Fecha=$mytime->toDateTimeString();
        $produccion->CantidadFaltante=$request->get('CantidadFaltante');
        $produccion->CantidadProducir=$request->get('CantidadProducir');
        $produccion->CantidadProducida=$request->get('CantidadProducida');
        $produccion->Comentario=$request->get('Comentario');
        $produccion->Condicion='1';
        $produccion->save();
        
        DB::select("call matutilizados");
        DB::select("call cantfantante");


    }

    catch (\Illuminate\Database\QueryException $e)
        {

              return '
                    ----------------------------
                       NO TIENE LA CANTIDAD SUFICIENTE DE MATERIALES PARA ESTA PRODUCCION, FAVOR PULSE RETROCEDER (←) Y ACTUALICE SU STOCK
                    ---------------------------';

        }
                 
                return Redirect::to('almacen/produccion');

    }


    public function show($id)
    {

        $produccion=DB::table('produccion as p')
            ->join('pedido as ped', 'p.IdPedido','=','ped.IdPedido')
            ->join('detalleproduccion as dp', 'p.IdProduccion','=','dp.IdProduccion')
            ->select('p.IdProduccion', 'p.Estatus',  'p.Condicion', 'p.Fecha', 'p.Comentario')
            ->where('p.IdProduccion', '=', $id)
            ->first();


        return view("almacen.produccion.show",["produccion"=>$produccion]
        );
    }


     public function edit($id)
    {

        /* $produccion=DB::table('produccion as pro')
             ->join('receta as r', 'pro.IdReceta','=','r.IdReceta')
             ->join('producto as p', 'r.IdProducto','=','p.IdProducto')
            ->select('pro.IdProduccion', 'pro.CantidadFaltante', 'pro.CantidadProducir', 'pro.CantidadProducida','pro.Comentario', 'pro.Condicion', 'pro.Estatus', 'p.Nombre', 'p.Descripcion', 'p.IdProducto')
            ->where('pro.IdProduccion', '=', $id)
            ->first();*/




        return view("almacen.produccion.edit",["produccion"=>Produccion::findOrFail($id)]);
    }
    public function update(ProduccionFormRequest $request,$id)  // funcion para editar
    {


        $produccion=Produccion::find($id);
        $produccion->Estatus=$request->get('Estatus');
        $produccion->Comentario=$request->get('Comentario');
        $produccion->update();

       
        
        return Redirect::to('almacen/produccion');
    }


    public function destroy($id)  // funcion para borrar
    {
        $produccion=Produccion::findOrFail($id);
        $produccion->Condicion='0';
        $produccion->update();
        return Redirect::to('almacen/produccion');
    }

}
