<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculos extends Model
{
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vehiculos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'nombre', 'chassis', 'numero_motor', 'ano', 'placa', 'tipo_vehiculo_id', 'marca_id', 'modelo_id', 'tipo_combustible_id', 'estado'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}
