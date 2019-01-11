<?php

namespace Shuxhy;

use Illuminate\Database\Eloquent\Model;

class Suplidor extends Model
{
    protected $table='suplidor';

    protected $primaryKey='IdSuplidor';

    public $timestamps=false;


    protected $fillable =[ 
    	
        'Compania',
        'Direccion',
    	'Telefono',
        'NombreContacto',
    	'Comentario',
        'Condicion'

    ];

    protected $guarded =[

    ];
}
