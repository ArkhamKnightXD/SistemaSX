<?php

namespace Shuxhy\Http\Controllers;

use Illuminate\Http\Request;

use Shuxhy\Http\Requests;
use Shuxhy\Producto;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input; // Para poder subir archivos e imagenes
use Shuxhy\Http\Requests\ProductoFormRequest;
use DB;

class ProductoController extends Controller
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
            $productos=DB::table('producto as p')
            ->join('unidad as u', 'p.IdUnidad','=','u.IdUnidad')
            ->join('forma as f', 'p.IdForma','=','f.IdForma')
            ->join('sabor as s', 'p.IdSabor','=','s.IdSabor')
            ->join('relleno as r', 'p.IdRelleno','=','r.IdRelleno')
            ->join('topping as t', 'p.IdTopping','=','t.IdTopping')
            ->select('p.IdProducto', 'p.Nombre', 'p.Descripcion', 'p.CostoProduccion', 'p.Imagen', 'p.Condicion', 'p.Stock', 'p.Precio', 'u.Abreviatura', 'u.NombreUnidad' , 'f.Nombre AS Forma' , 's.Nombre AS Sabor' , 'r.Nombre AS Relleno' , 't.Nombre AS Topping')
            ->where('p.Nombre','LIKE','%'.$query.'%')
            ->where ('p.Condicion','=','1') 
            ->orderBy('p.IdProducto', 'desc')
            ->paginate(7);
            return view('almacen.producto.index',["productos"=>$productos,"searchText"=>$query]);
        }
    }
    public function create()
    {

        $unidades=DB::table('unidad')
        ->where('Condicion','=','1')
        ->get();

        $formas=DB::table('forma')
        ->where('Condicion','=','1')
        ->get();

        $rellenos=DB::table('relleno')
        ->where('Condicion','=','1')
        ->get();

        $sabores=DB::table('sabor')
        ->where('Condicion','=','1')
        ->get();

        $toppings=DB::table('topping')
        ->where('Condicion','=','1')
        ->get();

        return view('almacen.producto.create',["unidades"=>$unidades, "formas"=>$formas, "rellenos"=>$rellenos, "sabores"=>$sabores, "toppings"=>$toppings]);
    }
    public function store (ProductoFormRequest $request)  // Funcion para crear 
    {
        $producto=new Producto;
        $producto->Nombre=$request->get('Nombre');
        $producto->Descripcion=$request->get('Descripcion');
        $producto->Precio=$request->get('Precio');
        $producto->Stock='0';
        $producto->IdUnidad=$request->get('IdUnidad');
        $producto->CostoProduccion='0';
        $producto->IdForma=$request->get('IdForma');
        $producto->IdRelleno=$request->get('IdRelleno');
        $producto->IdSabor=$request->get('IdSabor');
        $producto->IdTopping=$request->get('IdTopping');

        if (Input::hasFile('Imagen')) 
        {
            $file=Input::file('Imagen');
            $file->move(public_path(). 'imagenes/productos/', $file->getClientOriginalName());
            $producto->Imagen=$file->getClientOriginalName();
        }


        $producto->condicion='1';
        $producto->save();
        return Redirect::to('almacen/producto');

    }
    public function show($id)
    {
        return view("almacen.producto.show",["producto"=>Producto::findOrFail($id)]);
    }
    public function edit($id)
    {

        $unidad=DB::table('unidad')
        ->where('Condicion','=','1')
        ->get();

        $forma=DB::table('forma')
        ->where('Condicion','=','1')
        ->get();

        $relleno=DB::table('relleno')
        ->where('Condicion','=','1')
        ->get();

        $sabor=DB::table('sabor')
        ->where('Condicion','=','1')
        ->get();

        $topping=DB::table('topping')
        ->where('Condicion','=','1')
        ->get();

        $producto=Producto::findOrFail($id);

        return view('almacen.producto.edit',["unidad"=>$unidad, "forma"=>$forma, "relleno"=>$relleno, "sabor"=>$sabor, "topping"=>$topping, "producto"=>$producto]);

        
    }
    public function update(ProductoFormRequest $request,$id)  // funcion para editar
    {
        $producto=Producto::findOrFail($id);
        $producto->Nombre=$request->get('Nombre');
        $producto->Descripcion=$request->get('Descripcion');
        $producto->Precio=$request->get('Precio');
        $producto->IdUnidad=$request->get('IdUnidad');
        $producto->IdForma=$request->get('IdForma');
        $producto->IdRelleno=$request->get('IdRelleno');
        $producto->IdSabor=$request->get('IdSabor');
        $producto->IdTopping=$request->get('IdTopping');

        if (Input::hasFile('Imagen')) 
        {
            $file=Input::file('Imagen');
            $file->move(public_path(). 'imagenes/productos/', $file->getClientOriginalName());
            $producto->Imagen=$file->getClientOriginalName();
        }
        
        $producto->update();
        return Redirect::to('almacen/producto');
    }
   /* public function destroy($id)  // funcion para borrar
    {
        $producto=Producto::findOrFail($id);
        $producto->condicion='0';
        $producto->update();
        return Redirect::to('almacen/producto');
    }*/
}
