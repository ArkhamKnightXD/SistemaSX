<?php

namespace Shuxhy;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table='factura';

    protected $primaryKey='IdFactura';

    public $timestamps=false;


    protected $fillable =[

    
    	'Fecha',
    	'TotalFacturado',
        'FormaPago',
    	'Condicion'
    	
    ];

    protected $guarded =[

    ];
}
