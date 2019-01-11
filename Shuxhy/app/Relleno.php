<?php

namespace Shuxhy;

use Illuminate\Database\Eloquent\Model;

class Relleno extends Model
{
    protected $table='relleno';

    protected $primaryKey='IdRelleno';

    public $timestamps=false;


    protected $fillable =[ 
    	'Nombre',
    	'Abreviatura',
    	'Condicion'

    ];

    protected $guarded =[

    ];


}