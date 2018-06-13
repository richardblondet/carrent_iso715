<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Renta extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'renta';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'empleado_id', 'cliente_id', 'monto_por_dia', 'comision_empleado', 'comentario', 'estado', 'lugar_renta', 'lugar_devolucion', 'inspeccion_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function cliente() {
        return $this->hasOne('App\Usuarios', 'id', 'cliente_id');
    }

    public function empleado() {
        return $this->hasOne('App\Usuarios', 'id', 'empleado_id');
    }

    public function inspeccion() {
        return $this->hasOne('App\Inspeccion', 'id', 'inspeccion_id');
    }
}
