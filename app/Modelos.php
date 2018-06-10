<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelos extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'modelos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'modelo', 'marca_id', 'estado'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Relationships with marcas
     *
     * @access public
     */
    public function marca() {
        return $this->belongsTo('App\Marcas', 'marca_id', 'id');
    }
}
