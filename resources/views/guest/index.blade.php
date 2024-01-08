@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>Consulta Zona de Entregador</h1></div>
                <div class="card-body">

                    <form method="GET" >
                        <div class="row">
                            <div class="col-md-5">
                                <label for="client" class="form-label">Cliente</label>
                                <input id="client" type="client" class="form-control @error('client') is-invalid @enderror" name="client" value="{{ \Request::get('client') }}" required autofocus>
                            </div>


                            <div class="col-md-5">
                                <label for="date" class="form-label">Fecha</label>
                                <div class="input-group date">
                                    <input type="date" class="form-control" id="date" name="date" value="{{ \Request::get('date') }}" />
                                </div>
                            </div>
                            <div class="col-md-2 d-flex justify-content-center align-items-center">
                                <button type="submit" class="btn btn-primary">
                                    Consultar
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            @if ( $entity )
            <div class="row">

                <div class="col">
                    <div class="card mt-2">
                        <div class="card-header">CLIENTE</div>
                        <div class="card-body px-0 mx-0">
                            <table class="table table-striped table-hover">
                                <tbody>
                                    <tr>
                                        <th>RV</th>
                                        <td>{{ $entity->cliente->rv }}</td>
                                    </tr>
                                    <tr>
                                        <th>NOMBRE ESTABLECIMIENTO</th>
                                        <td>{{ $entity->cliente->nombre_establecimiento }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col">
                    <div class="card mt-2">
                        <div class="card-header">ZONA DEL DIA</div>
                        <div class="card-body">
                            <h1 class="text-center">{{ $entity->vehiculo->zona }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mt-2">
                        <div class="card-header">NUMERO CONTACTO</div>
                        <div class="card-body">
                            <h2 class="text-center">
                                <a href="https://wa.me/{{ $entity->vehiculo->celular }}">{{ $entity->vehiculo->celular }}</a>
                            </h2>
                        </div>
                    </div>

                </div>
                <div class="col">
                    <div class="card mt-2">
                        <div class="card-header">NOMBRE CONTACTO</div>
                        <div class="card-body">
                            <h2 class="text-center">{{ $entity->vehiculo->nombre }}</h2>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="card mt-2">
                        <div class="card-header">NOVEDADES</div>
                        <div class="card-body">
                            @if ( $entity->novedades->count() > 0 )
                                <table class="table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>CODIGO</th>
                                            <th>CLIENTE</th>
                                            <th>PRODUCTO</th>
                                            <th>MOTIVO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($entity->novedades as $novedad)
                                        <tr>
                                            <td>{{ $novedad->cliente->rv }} </td>
                                            <td>{{ $novedad->cliente->nombre_establecimiento }}</td>
                                            <td>{{ $novedad->producto }}</td>
                                            <td>{{ $novedad->motivo }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <h2 class="text-center">SIN NOVEDADES</h2>
                            @endif

                        </div>
                    </div>
                </div>
            </div>




            @endif

        </div>
    </div>
</div>
@endsection
