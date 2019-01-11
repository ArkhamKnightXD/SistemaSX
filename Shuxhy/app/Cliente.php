<?php

namespace Shuxhy;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='cliente';

    protected $primaryKey='IdCliente';

    public $timestamps=false;


    protected $fillable =[ 
    	'Nombre',
    	'Apellido',
    	'Comentario',
        'Direccion',
    	'Telefono',
    	'UsuarioIG',
        'Condicion'

    ];

    protected $guarded =[

    ];


}
