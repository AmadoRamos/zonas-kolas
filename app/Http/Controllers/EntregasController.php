<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator  as Paginator;
use App\Models\VehiculoCliente as Entity;
use App\Models\Cliente;
use App\Models\Vehiculo;

use App\Imports\EntregasImport;


use DB;
use Auth;
use Excel;

/**
 *
 * @author Amado Ramos <amado0529@gmail.com>
 */
class EntregasController extends Controller {


     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index( Request $request)
    {
        $entities       = Entity::paginate(15);
        return view('dashboard.entregas.index', compact( 'entities'));
    }

    public function upload(Request $request)
    {
        try {
            if( $request->file != null )
            {
                $file = $request->file('file');
                Excel::import(new EntregasImport, $file);

            }
            else
            {

                return redirect()
                    ->route('entregas.index')
                    ->with('swal', [ 'title' => null, 'message' => "Sin Archivo", 'status' => 'info' ] );
            }
        }
        catch (Exception $e)
        {
            return redirect()
                   ->route('entregas.index')
                   ->with('swal', [ 'title' => 'Error', 'message' => $e->getMessage(), 'status' => 'error' ] );
         }
        return redirect()
               ->route('entregas.index')
               ->with('swal', [ 'title' => null, 'message' => null, 'status' => 'success' ] );
    }

    public function create( Request $request)
    {
        $clientes = Cliente::all();
        $vehiculos = Vehiculo::all();
        return view('dashboard.entregas.create', compact("clientes" ,"vehiculos"));
    }

    public function store( Request $request)
    {
        try {
            $entity = Entity::create($request->all());
            } catch (Exception $e) {
            return redirect()
                     ->route('entregas.index')
                     ->with('swal', [ 'title' => 'Error', 'message' => $e->getMessage(), 'status' => 'error' ] );
         }
        return redirect()
                ->route('entregas.index')
                ->with('swal', [
                        'title' => null,
                        'message' => null,
                        'status' => 'success'
                    ]);
    }

    public function edit( Request $request, $id)
    {
        $clientes = Cliente::all();
        $vehiculos = Vehiculo::all();

        $entity         = Entity::findOrFail($id);
        return view('dashboard.entregas.edit', compact('entity' ,'clientes', "vehiculos"));
    }

    public function update( Request $request, $id)
    {
        try {
            $entity         = Entity::findOrFail($id);
            $entity->fill( $request->all());
            $entity->save();
        }
        catch (Exception $e)
        {
            return redirect()
                   ->route('entregas.index')
                   ->with('swal', [ 'title' => 'Error', 'message' => $e->getMessage(), 'status' => 'error' ] );
         }
        return redirect()
               ->route('entregas.index')
               ->with('swal', [ 'title' => null, 'message' => null, 'status' => 'success' ] );

    }

}
