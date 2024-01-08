@extends('layouts.app')

@section('content')
   <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header" >Editar vehiculo: {{$entity->nombre }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('vehiculos.update', [$entity->id]) }}" class="row">
                            @include('dashboard.vehiculos.partials.fields')
                            <div class="col-md-12 text-center mt-5">
                                <button class="btn btn-primary" type="submit" name="action">EDITAR</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
