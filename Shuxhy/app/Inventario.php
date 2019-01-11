<?php

namespace Shuxhy;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table='inventario';

    protected $primaryKey='IdInventario';

    public $timestamps=false;


    protected $fillable =[ 
    	
        'Nombre',
        'IdProducto',
        'Fecha',
        'PrecioProducto',
        'IdMaterial',
    	'CantProducto',
        'CantMaterial',
        'Condicion'
       

    ];

    protected $guarded =[

    ];
}
