<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vehiculo;

class VehiculoController extends Controller
{
    // Metodo que se ejecuta cuando se accede a la ruta /home
    public function index()
    {
        // Obtiene todos los vehiculos junto con sus relaciones tipoVehiculo y propietario
        $vehiculos = vehiculo::with(['tipoVehiculo', 'propietario'])->get();

        // Retorna la vista 'Home.home' y le pasa la variable $vehiculos
        return view('Home.home', compact('vehiculos')); 
    }
}
