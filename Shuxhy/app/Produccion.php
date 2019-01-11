<?php

namespace Shuxhy;

use Illuminate\Database\Eloquent\Model;

class Produccion extends Model
{
    protected $table='produccion';

    protected $primaryKey='IdProduccion';

    public $timestamps=false;


    protected $fillable =[ 
    	'Fecha',
        'IdReceta',
        'IdProducto',
        'CantidadProducida',
        'CantidadProducir',
        'CantidadFaltante',
        'Estatus',
        'Comentario',
        'Condicion'

    ];

    protected $guarded =[

    ];
}
