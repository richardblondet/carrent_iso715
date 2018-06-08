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
    	'empleado_id', 'cliente_id', 'monto_por_dia', 'comision_empleado', 'comentario', 'estado', 'lugar_renta', 'lugar_devolucion'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}
