<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator  as Paginator;
use App\Models\Novedad as Entity;
use App\Models\Cliente;

use App\Imports\NovedadesImport;

use DB;
use Auth;
use Excel;

/**
 *
 * @author Amado Ramos <amado0529@gmail.com>
 */
class NovedadesController extends Controller {


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
        return view('dashboard.novedades.index', compact( 'entities'));
    }

    public function upload(Request $request)
    {
        try {
            if( $request->file != null )
            {
                $file = $request->file('file');
                Excel::import(new NovedadesImport, $file);

            }
            else
            {

                return redirect()
                    ->route('novedades.index')
                    ->with('swal', [ 'title' => null, 'message' => "Sin Archivo", 'status' => 'info' ] );
            }
        }
        catch (Exception $e)
        {
            return redirect()
                   ->route('novedades.index')
                   ->with('swal', [ 'title' => 'Error', 'message' => $e->getMessage(), 'status' => 'error' ] );
         }
        return redirect()
               ->route('novedades.index')
               ->with('swal', [ 'title' => null, 'message' => null, 'status' => 'success' ] );
    }

    public function create( Request $request)
    {
        $clientes = Cliente::all();
        return view('dashboard.novedades.create', compact("clientes"));
    }

    public function store( Request $request)
    {
        try {
            $entity = Entity::create($request->all());
            } catch (Exception $e) {
            return redirect()
                     ->route('novedades.index')
                     ->with('swal', [ 'title' => 'Error', 'message' => $e->getMessage(), 'status' => 'error' ] );
         }
        return redirect()
                ->route('novedades.index')
                ->with('swal', [
                        'title' => null,
                        'message' => null,
                        'status' => 'success'
                    ]);
    }

    public function edit( Request $request, $id)
    {
        $clientes = Cliente::all();
        $entity         = Entity::findOrFail($id);
        return view('dashboard.novedades.edit', compact('entity' ,'clientes'));
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
                   ->route('novedades.index')
                   ->with('swal', [ 'title' => 'Error', 'message' => $e->getMessage(), 'status' => 'error' ] );
         }
        return redirect()
               ->route('novedades.index')
               ->with('swal', [ 'title' => null, 'message' => null, 'status' => 'success' ] );

    }

}
