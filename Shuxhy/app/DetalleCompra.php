<?php

namespace Shuxhy;

use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    protected $table='detallecompra';

    protected $primaryKey='IdDetalleCompra';

    public $timestamps=false;


    protected $fillable =[
    	'IdCompra',
        'IdMaterial',
        'Subtotal',
        'Cantidad',
        'Precio'   	
    ];

    protected $guarded =[

    ];
}
