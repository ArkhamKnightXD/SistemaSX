<?php

namespace Shuxhy;

use Illuminate\Database\Eloquent\Model;

class Sabor extends Model
{
    protected $table='sabor';

    protected $primaryKey='IdSabor';

    public $timestamps=false;


    protected $fillable =[ 
    	'Nombre',
    	'Abreviatura',
    	'Condicion'

    ];

    protected $guarded =[

    ];


}