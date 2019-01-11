<?php

namespace Shuxhy;

use Illuminate\Database\Eloquent\Model;

class Topping extends Model
{
    protected $table='topping';

    protected $primaryKey='IdTopping';

    public $timestamps=false;


    protected $fillable =[ 
    	'Nombre',
    	'Abreviatura',
    	'Condicion'

    ];

    protected $guarded =[

    ];


}