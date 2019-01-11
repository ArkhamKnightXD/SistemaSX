<?php

namespace Shuxhy;

use Illuminate\Database\Eloquent\Model;

class DetalleCombo extends Model
{
    protected $table='detallecombo';

    protected $primaryKey='IdDetalleCombo';

    public $timestamps=false;


    protected $fillable =[
    	'IdCombo',
    	'IdProducto',
        'Cantidad',
        'Precio'
        
    	
    ];

    protected $guarded =[

    ];
}
