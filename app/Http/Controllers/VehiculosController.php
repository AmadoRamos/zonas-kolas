<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator  as Paginator;
use App\Models\Vehiculo as Entity;

use DB;
use Auth;

/**
 *
 * @author Amado Ramos <amado0529@gmail.com>
 */
class VehiculosController extends Controller {


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
        return view('dashboard.vehiculos.index', compact( 'entities'));
    }

    public function create( Request $request)
    {

        return view('dashboard.vehiculos.create');
    }

    public function store( Request $request)
    {
        try {
            $entity = Entity::create($request->all());
            } catch (Exception $e) {
            return redirect()
                     ->route('vehiculos.index')
                     ->with('swal', [ 'title' => 'Error', 'message' => $e->getMessage(), 'status' => 'error' ] );
         }
        return redirect()
                ->route('vehiculos.index')
                ->with('swal', [
                        'title' => null,
                        'message' => null,
                        'status' => 'success'
                    ]);
    }

    public function edit( Request $request, $id)
    {
        $entity         = Entity::findOrFail($id);
        return view('dashboard.vehiculos.edit', compact('entity'));
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
                   ->route('vehiculos.index')
                   ->with('swal', [ 'title' => 'Error', 'message' => $e->getMessage(), 'status' => 'error' ] );
         }
        return redirect()
               ->route('vehiculos.index')
               ->with('swal', [ 'title' => null, 'message' => null, 'status' => 'success' ] );

    }

}
