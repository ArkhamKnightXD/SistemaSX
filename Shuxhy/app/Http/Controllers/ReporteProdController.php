<?php

namespace Shuxhy\Http\Controllers;

use Illuminate\Http\Request;

use Shuxhy\Http\Requests;


use Illuminate\Support\Facades\Redirect;
use Shuxhy\Produccion;
use PdfReport;
use PDF;
use DB;

class ReporteProdController extends Controller
{


  public function displayReport(Request $request) {
    // Retrieve any filters
    $fromDate = $request->input('Desde');   
    $toDate = $request->input('Hasta');

    // Report title
    $title = 'Produccion'; 

    // For displaying filters description on header
    $meta = [
        'Desde ' => $fromDate . ' Hasta ' . $toDate   //Lo que va a mostrar en la cabecera
    ];

 
    $queryBuilder = Produccion::select('IdProduccion','IdReceta', 'CantidadProducida','CantidadFaltante', 'Fecha')
                    ->whereBetween('Fecha', [$fromDate, $toDate]);
               
    $columns = [
    	'# de Produccion' => 'IdProduccion', 
        'IdReceta' => 'IdReceta', 
        'Fecha' =>'Fecha',
        'CantProducida' => 'CantidadProducida',
        'CantFaltante' => 'CantidadFaltante'
      
    ];

         #  dd($queryBuilder);

  

return PdfReport::of($title, $meta, $queryBuilder, $columns)
                ->editColumn('Fecha', [
                    'displayAs' => function($result) {
                        return  $result->Fecha;
                    }
                ])
                ->editColumn('CantProducida', [
                    'displayAs' => function($result) {
                        return  $result->CantidadProducida;
                    }
                ])
              
                  ->editColumn('CantFaltante', [
                    'displayAs' => function($result) {
                        return  $result->CantidadFaltante;
                    }
                ])
                 ->editColumns(['CantFaltante'], [
                    'class' => 'right bold'
                ])
                 ->showTotal([
                 	'CantProducida' => '#', 
                    'CantFaltante' => '#' // if you want to show dollar sign ($) then use 'Total Balance' => '$'
                
                ])
                ->limit(20)
                ->stream('prueba'); // or download('filename here..') to download pdf    */

} 
    
    public function create()
    {
        return view('Reportes.produccion.displayreport'); 
    }

   
    public function show($id)
    {
        
    }


}


