<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditoClientes extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'credito_cliente';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'nombre_tarjeta', 'cvv', 'numberos', 'tipo', 'estado', 'limite_credito'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}
