<?php

namespace Shuxhy;

use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    protected $table='detallepedido';

    protected $primaryKey='IdDetallePedido';

    public $timestamps=false;


    protected $fillable =[ 
    	'IdPedido',
        'IdCombo',
        'IdProducto',
        'Cantidad',
        'Subtotal',
        'PrecioProducto',
        'PrecioCombo',
        'CantidadCombo',

    ];

    protected $guarded =[

    ];
}
