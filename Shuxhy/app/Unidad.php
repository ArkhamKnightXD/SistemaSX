<?php

namespace Shuxhy;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    protected $table='unidad';

    protected $primaryKey='IdUnidad';

    public $timestamps=false;


    protected $fillable =[ 
    	'NombreUnidad',
    	'Abreviatura',
    	'Condicion'

    ];

    protected $guarded =[

    ];


}