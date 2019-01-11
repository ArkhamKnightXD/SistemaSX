<?php

namespace Shuxhy\Http\Controllers;

use Illuminate\Http\Request;

use Shuxhy\Http\Requests;


use Illuminate\Support\Facades\Redirect;
use Shuxhy\Http\Requests\ReporteFormRequest;
use Shuxhy\Factura;
use PdfReport;
use PDF;
use DB;

class ReporteController extends Controller
{


  public function displayReport(Request $request) {
    // Retrieve any filters
    $fromDate = $request->input('Desde');   
    $toDate = $request->input('Hasta');

    // Report title
    $title = 'Facturas Generadas'; 

    // For displaying filters description on header
    $meta = [
        'Desde ' => $fromDate . ' Hasta ' . $toDate   //Lo que va a mostrar en la cabecera
    ];

 
    $queryBuilder = Factura::select('FormaPago', 'TotalFacturado', 'Fecha')
                    ->whereBetween('Fecha', [$fromDate, $toDate]);
               
    $columns = [
        'FormaPago' => 'FormaPago', 
        'Fecha' =>'Fecha',
        'TotalFacturado' => 'TotalFacturado'
      
    ];

         #  dd($queryBuilder);

  

return PdfReport::of($title, $meta, $queryBuilder, $columns)
                ->editColumn('Fecha', [
                    'displayAs' => function($result) {
                        return  $result->Fecha;
                    }
                ])
                ->editColumn('TotalFacturado', [
                    'displayAs' => function($result) {
                        return  $result->TotalFacturado;
                    }
                ])
                ->editColumns(['TotalFacturado'], [
                    'class' => 'right bold'
                ])
                ->showTotal([
                    'TotalFacturado' => '$' // if you want to show dollar sign ($) then use 'Total Balance' => '$'
                ])
                ->limit(20)
                ->stream('prueba'); // or download('filename here..') to download pdf    */

} 
    
    public function create()
    {
        return view('Reportes.ventas.displayreport'); 
    }

   
    public function show($id)
    {
        
    }


}


