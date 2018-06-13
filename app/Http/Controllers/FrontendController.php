<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehiculos;

class FrontendController extends Controller
{
    public function index() {
    	$vehiculos = Vehiculos::where('estado', 1)->get();
    	return view('frontend.iniciar')->with([
    		'vehiculos' => $vehiculos
    	]);
    }
}
