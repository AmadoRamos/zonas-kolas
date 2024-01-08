@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header" >
                    <h2>
                        Entregas
                        <label for="file" class="btn btn-secondary float-end mx-1"> <i class="fa fa-upload"></i></label>
                        <a href="{{ route("entregas.create") }}" class="btn btn-success float-end"><i class="fa fa-plus"></i></a>
                    </h2>

                    <form action="{{ route("entregas.upload") }}" method="POST" style="display:none" id="upload-file" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" id="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"  onchange="document.querySelector('#upload-file').submit()">
                    </form>

                </div>

                <div class="card-body">
                      <table class="table table-striped table-hover" >
                        <thead>
                          <tr>
                            <th>Cliente</th>
                            <th>Zona</th>
                            <th>Vehiculo</th>
                            <th>Fecha</th>
                            <td data-orderable="false"></td>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($entities as $entity)
                          <tr>
                            <td>{{ $entity->cliente->nombre_establecimiento }}</td>
                            <td>{{ $entity->vehiculo->zona }}</td>
                            <td>{{ $entity->vehiculo->nombre }}</td>
                            <td>{{ $entity->fecha }}</td>
                            <td class="right-align">
                              <a href="{{ route('entregas.edit', $entity->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
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
