<?php

namespace Shuxhy\Http\Controllers;

use Illuminate\Http\Request;

use Shuxhy\Http\Requests;
use Shuxhy\Combo;
use Shuxhy\DetalleCombo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input; // Para poder subir archivos e imagenes
use Shuxhy\Http\Requests\ComboFormRequest;
use DB;

use Response; 
use Illuminate\Support\Collection;

class ComboController extends Controller
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
             $combos=DB::table('combo as c')
            ->join('detallecombo as dc', 'c.IdCombo','=','dc.IdCombo')
            ->select('c.IdCombo', 'c.Nombre','c.Descuento', 'c.Descripcion', 'c.Imagen','c.Subtotal', 'c.Condicion', 'c.Total')
            ->where('c.Nombre','LIKE','%'.$query.'%')
            ->where ('c.Condicion','=','1') 
            ->orderBy('c.IdCombo', 'desc')
            ->groupBy('c.IdCombo', 'c.Nombre', 'c.Descuento', 'c.Descripcion', 'c.Imagen', 'c.Subtotal', 'c.Condicion', 'c.Total')
            ->paginate(7);
            return view('almacen.combo.index',["combos"=>$combos,"searchText"=>$query]);
        }
    }
    public function create() // No  creo que haya problemas en esta parte
    {
        $productos=DB::table('producto as prod')
        ->select(DB::raw('CONCAT(prod.Nombre, " ", prod.Descripcion ) AS producto'),'prod.IdProducto', 'prod.Precio')
        ->where('prod.Condicion','=','1')
        ->get();


        return view('almacen.combo.create',["productos"=>$productos]);
    }
    public function store (ComboFormRequest $request)  // Es muy probable que el problema este aqui, pues no encuentro ningun error en la vista create
    {
        try
        {

        DB::beginTransaction();
        $combo=new Combo;
        $combo->Nombre=$request->get('Nombre');
        $combo->Descripcion=$request->get('Descripcion');
        $combo->Descuento=$request->get('Descuento');
        //$combo->Subtotal=$request->get('Subtotal');
        $combo->Total=$request->get('Total');
        
        if (Input::hasFile('Imagen')) 
        {
            $file=Input::file('Imagen');
            $file->move(public_path(). 'imagenes/combos/', $file->getClientOriginalName());
            $combo->Imagen=$file->getClientOriginalName();
        }
        $combo->Condicion='1';
        $combo->save();

        $IdProducto = $request->get('IdProducto');
        $Cantidad = $request->get('Cantidad');
        $Precio = $request->get('Precio');

        $cont=0;

        while ($cont < (count($IdProducto))) 
        {
            $DetalleCombo = new DetalleCombo();
            $DetalleCombo->IdCombo=$combo->IdCombo;
            $DetalleCombo->IdProducto=$IdProducto[$cont];
            $DetalleCombo->Cantidad=$Cantidad[$cont];
            $DetalleCombo->Precio=$Precio[$cont];
            $DetalleCombo->save();
            $cont=$cont+1;

       }

            DB::commit();

        }
        catch(\Exception $e)
        {

            DB::rollback();

        }


        
        return Redirect::to('almacen/combo');

    }
    public function show($id)
    {
        $combo=DB::table('combo as c')
            ->join('detallecombo as dc', 'c.IdCombo','=','dc.IdCombo')
             ->select('c.IdCombo', 'c.Nombre', 'c.Descripcion','c.Descuento', 'c.Imagen','c.Subtotal', 'c.Condicion', 'c.Total')
            ->where('c.IdCombo', '=', $id)
            ->first();

            $detallecombo=DB::table('detallecombo as dc')
            ->join('producto as prod', 'dc.IdProducto','=','prod.IdProducto')
            ->select('prod.Nombre as producto', 'dc.Cantidad', 'dc.Precio')
            ->where('dc.IdCombo', '=', $id)
            ->get();

        return view("almacen.combo.show",["combo"=>$combo,"detallecombo"=>$detallecombo]
        );

    }
    
    public function destroy($id)  // funcion para borrar
    {
        $combo=Combo::findOrFail($id);
        $combo->Condicion='0';
        $combo->update();
        return Redirect::to('almacen/combo');
    }


}


