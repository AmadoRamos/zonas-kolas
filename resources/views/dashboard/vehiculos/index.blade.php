@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header" >
                    <h2>Vehiculos <a href="{{ route("vehiculos.create") }}" class="btn btn-success float-end"><i class="fa fa-plus"></i></a></h2>
                </div>

                <div class="card-body">
                      <table class="table table-striped table-hover" >
                        <thead>
                          <tr>
                            <th>Codigo</th>
                            <th>Zona</th>
                            <th>Nombre</th>
                            <th>Celular</th>
                            <td data-orderable="false"></td>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($entities as $entity)
                          <tr>
                            <td>{{ $entity->code }}</td>
                            <td>{{ $entity->zona }}</td>
                            <td>{{ $entity->nombre }}</td>
                            <td>{{ $entity->celular }}</td>
                            <td class="right-align">
                              <a href="{{ route('vehiculos.edit', $entity->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>

                <div class="card-footer">
                    {{ $entities->links() }}
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
