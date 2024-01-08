<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Http\Controllers\Controller;


use Illuminate\Pagination\LengthAwarePaginator  as Paginator;

use App\Models\Cliente as Entity;
use App\Imports\ClientesImport;
use DB;
use Auth;
use Excel;

/**
 *
 * @author Amado Ramos <amado0529@gmail.com>
 */

class ClientesController extends Controller {


     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function upload(Request $request)
    {
        try {
            if( $request->file != null )
            {
                $file = $request->file('file');
                Excel::import(new ClientesImport, $file);

            }
            else
            {

                return redirect()
                    ->route('clientes.index')
                    ->with('swal', [ 'title' => null, 'message' => "Sin Archivo", 'status' => 'info' ] );
            }
        }
        catch (Exception $e)
        {
            return redirect()
                   ->route('clientes.index')
                   ->with('swal', [ 'title' => 'Error', 'message' => $e->getMessage(), 'status' => 'error' ] );
         }
        return redirect()
               ->route('clientes.index')
               ->with('swal', [ 'title' => null, 'message' => null, 'status' => 'success' ] );
    }

    public function index( Request $request)
    {
        $entities       = Entity::paginate(20);
        return view('dashboard.clientes.index', compact( 'entities'));
    }

    public function create( Request $request)
    {

        return view('dashboard.clientes.create');
    }

    public function store( Request $request)
    {
        try {
            $entity = Entity::create($request->all());
            } catch (Exception $e) {
            return redirect()
                     ->route('clientes.index')
                     ->with('swal', [ 'title' => 'Error', 'message' => $e->getMessage(), 'status' => 'error' ] );
         }
        return redirect()
                ->route('clientes.index')
                ->with('swal', [
                        'title' => null,
                        'message' => null,
                        'status' => 'success'
                    ]);
    }

    public function edit( Request $request, $id)
    {
        $entity         = Entity::findOrFail($id);
        return view('dashboard.clientes.edit', compact('entity'));
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
                   ->route('clientes.index')
                   ->with('swal', [ 'title' => 'Error', 'message' => $e->getMessage(), 'status' => 'error' ] );
         }
        return redirect()
               ->route('clientes.index')
               ->with('swal', [ 'title' => null, 'message' => null, 'status' => 'success' ] );

    }

}
