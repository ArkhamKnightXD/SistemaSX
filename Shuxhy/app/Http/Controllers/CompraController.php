<?php

namespace Shuxhy\Http\Controllers;

use Illuminate\Http\Request;

use Shuxhy\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input; // Para poder subir archivos e imagenes
use Shuxhy\Http\Requests\CompraFormRequest;
use Shuxhy\Compra;
use Shuxhy\DetalleCompra;
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;


class CompraController extends Controller
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
            $compras=DB::table('compra as c')
            ->join('suplidor as s', 'c.IdSuplidor','=','s.IdSuplidor')
            ->join('detallecompra as dc', 'c.IdCompra','=','dc.IdCompra')
            ->select('c.IdCompra', 'c.Fecha', 'c.Comentario', 'c.Condicion', 's.Compania', 'c.Total')
            ->where('c.IdCompra','LIKE','%'.$query.'%')
            ->where ('c.Condicion','=','1') 
            ->orderBy('c.IdCompra', 'desc')
            ->groupBy('c.IdCompra', 'c.Fecha','s.Compania', 'c.Total')
            ->paginate(7);
            return view('almacen.compra.index',["compras"=>$compras,"searchText"=>$query]);

        }
    }


     public function create() // Lo que me falla debe de ser el script
    {
        $suplidores=DB::table('suplidor as s')
        ->select(DB::raw('CONCAT(s.Compania, " ", s.Telefono ) AS suplidor'),'s.IdSuplidor')
        ->where('s.Condicion','=','1')
        ->get();

        $materiales=DB::table('material as mat')
        ->select(DB::raw('CONCAT(mat.Nombre, " ", mat.Descripcion ) AS material'),'mat.IdMaterial', 'mat.Costo')
        ->where('mat.Condicion','=','1')
        ->get();  

    
        return view('almacen.compra.create',["suplidores"=>$suplidores,"materiales"=>$materiales]);

    }

    public function store (CompraFormRequest $request)  // Funcion para crear 
    { 

        try
        {

        DB::beginTransaction();
        $compra=new Compra;
        $compra->IdSuplidor=$request->get('IdSuplidor');
        $mytime=Carbon::now('America/Santo_Domingo');
        $compra->Fecha=$mytime->toDateTimeString();
        $compra->Comentario=$request->get('Comentario');
        $compra->Total=$request->get('Total');
        $compra->Condicion='1';
        $compra->save();

        $IdMaterial = $request->get('IdMaterial');
        $Cantidad = $request->get('Cantidad');
        $Precio = $request->get('Precio');
       
        $cont=0;

        while ($cont < (count($IdMaterial))) 
        {
            $DetalleCompra = new DetalleCompra();
            $DetalleCompra->IdCompra=$compra->IdCompra;
            $DetalleCompra->IdMaterial=$IdMaterial[$cont];
            $DetalleCompra->Cantidad=$Cantidad[$cont];
            $DetalleCompra->Precio=$Precio[$cont];
            $DetalleCompra->save();
            $cont=$cont+1;



        }


            DB::commit();

        }
        catch(\Exception $e)
        {

           DB::rollback();

        }


        
        return Redirect::to('almacen/compra');

    }


    public function show($id)
    {

        $compra=DB::table('compra as c')
            ->join('detallecompra as dc', 'c.IdCompra','=','dc.IdCompra')
            ->join('suplidor as s', 'c.IdSuplidor','=','s.IdSuplidor')
            ->select('c.IdCompra', 'c.Fecha', 'c.Comentario', 'c.Condicion', 's.Compania', 'c.Total')
            ->where('c.IdCompra', '=', $id)
            ->first();

            $DetalleCompra=DB::table('detallecompra as dc')
            ->join('material as mat', 'dc.IdMaterial','=','mat.IdMaterial')
            ->select('mat.Nombre as material', 'dc.Cantidad', 'dc.Precio')
            ->where('dc.IdCompra', '=', $id)
            ->get();

        return view("almacen.compra.show",["compra"=>$compra,"DetalleCompra"=>$DetalleCompra]
        );
    }


    public function destroy($id)  // funcion para borrar
    {
        $compra=Compra::findOrFail($id);
        $compra->Condicion='0';
        $compra->update();
        return Redirect::to('almacen/compra');
    }



}