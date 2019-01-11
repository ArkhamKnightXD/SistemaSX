<?php

namespace Shuxhy;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
     protected $table='pedido';

    protected $primaryKey='IdPedido';

    public $timestamps=false;


    protected $fillable =[ 
    	'IdCliente',
    	'Estatus',
    	'DireccionEntrega',
        'FechaRealizado',
    	'FechaEntrega',
        'Total',
    	'Comentario',
        'Condicion'

    ];

    protected $guarded =[

    ];
}
