<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inspeccion extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'inspeccion';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'vehiculo_id', 'tiene_rayaduras', 'estado_combustible', 'goma_repuesta', 'gato', 'cristales_rotos', 'estado_gomas', 'empleado_id', 'estado'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function empleado() {
        return $this->hasOne('App\Usuarios', 'id', 'empleado_id');
    }

    public function vehiculo() {
        return $this->hasOne('App\Vehiculos', 'id', 'vehiculo_id');
    }

    
}

