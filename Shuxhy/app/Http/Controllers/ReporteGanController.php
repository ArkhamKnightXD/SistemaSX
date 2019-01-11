<?php

namespace Shuxhy\Http\Controllers;

use Illuminate\Http\Request;

use Shuxhy\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Shuxhy\Pedido;
use PdfReport;
use PDF;
use DB;


class ReporteGanController extends Controller
{
    public function displayReport(Request $request) {
    // Retrieve any filters
    $fromDate = $request->input('Desde');   
    $toDate = $request->input('Hasta');

    // Report title
    $title = 'Pedidos Realizados'; 

    // For displaying filters description on header
    $meta = [
        'Desde ' => $fromDate . ' Hasta ' . $toDate   //Lo que va a mostrar en la cabecera
    ];

 
    $queryBuilder = Pedido::select('IdCliente', 'Total', 'FechaEntrega')
                    ->whereBetween('FechaEntrega', [$fromDate, $toDate]);
               
    $columns = [
        'IdCliente' => 'IdCliente', 
        'FechaEntrega' =>'FechaEntrega',
        'Total' => 'Total'
      
    ];

         #  dd($queryBuilder);

  

return PdfReport::of($title, $meta, $queryBuilder, $columns)
                ->editColumn('FechaEntrega', [
                    'displayAs' => function($result) {
                        return  $result->FechaEntrega;
                    }
                ])
                ->editColumn('Total', [
                    'displayAs' => function($result) {
                        return  $result->Total;
                    }
                ])
                ->editColumns(['Total'], [
                    'class' => 'right bold'
                ])
                ->showTotal([
                    'Total' => '$' // if you want to show dollar sign ($) then use 'Total Balance' => '$'
                ])
                ->limit(20)
                ->stream('prueba'); // or download('filename here..') to download pdf    */

} 
    
    public function create()
    {
        return view('Reportes.ganancias.displayreport'); 
    }

   
    public function show($id)
    {
        
    }

}
