<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TiposVehiculos extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tipos_vehiculos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'nombre', 'estado'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}
