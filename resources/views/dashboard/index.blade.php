@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ACCION</th>
                                <th class="text-center">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="{{ route('clientes.index') }}">CLIENTES</a></td>
                                <td class="text-center">{{ $clientes }}</td>
                            </tr>
                            <tr>
                                <td><a href="{{ route("novedades.index") }}">NOVEDADES</a></td>
                                <td class="text-center">{{ $novedades }}</td>
                            </tr>
                            <tr>
                                <td><a href="{{ route("vehiculos.index") }}">VEHICULOS</a></td>
                                <td class="text-center">{{ $vehiculos }}</td>
                            </tr>
                            <tr>
                                <td><a href="{{ route("entregas.index") }}">ENTREGAS</a></td>
                                <td class="text-center">{{ $entregas }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
