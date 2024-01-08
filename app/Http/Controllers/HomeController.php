<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\VehiculoCliente;
use App\Models\Vehiculo;
use App\Models\Cliente;
use App\Models\Novedad;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['entregas']  = VehiculoCliente::count();
        $data['vehiculos']  = Vehiculo::count();
        $data['clientes']  = Cliente::count();
        $data['novedades']  = Novedad::count();

        return view('dashboard.index', $data);
    }
}
