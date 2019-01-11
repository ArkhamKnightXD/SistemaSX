<?php

namespace Shuxhy;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    protected $table='receta';

    protected $primaryKey='IdReceta';

    public $timestamps=false;


    protected $fillable =[
    	'Nombre',
        'Descripcion',
    	'Equipo',
        'IdProducto',
        'TiempoPreparacion',
        'SubTotal',
        'CostoIndirecto',
        'CostoManoDeObra',
        'CostoDeReposicion',
        'Porcion',
        'Total',
        'Condicion'
    	
    	
    ];

    protected $guarded =[

    ];
}
