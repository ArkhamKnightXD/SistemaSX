<?php

namespace Shuxhy;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table='compra';

    protected $primaryKey='IdCompra';

    public $timestamps=false;


    protected $fillable =[
    	'Fecha',
    	'IdSuplidor',
        'Comentario',
        'Total',
    	'Condicion'
    	
    ];

    protected $guarded =[

    ];
}
