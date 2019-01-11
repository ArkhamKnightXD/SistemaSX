<?php

namespace Shuxhy;

use Illuminate\Database\Eloquent\Model;

class Forma extends Model
{
    protected $table='forma';

    protected $primaryKey='IdForma';

    public $timestamps=false;


    protected $fillable =[ 
    	'Nombre',
    	'Abreviatura',
    	'Condicion'

    ];

    protected $guarded =[

    ];


}