<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\VehiculoCliente as Entity;


use Datetime;

class GuestController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $entity = Entity::where(function($query) use ($request) {
                            return $query->where("cliente_codigo", $request->client )
                            ->orWhereRaw("cast(cliente_codigo as UNSIGNED) = ?", intval( $request->client) );
                        })
                        ->where('fecha',  $request->date ?? (new Datetime)->format('Y-m-d') )
                        ->first();

        return view('guest.index', compact('entity'));
    }
}
