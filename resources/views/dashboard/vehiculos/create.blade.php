@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col ">
            <div class="card">
                <div class="card-header" >Nuevo vehiculo</div>
                <div class="card-body black-text">
                    <form method="POST" action="{{ route('vehiculos.store') }}" class="row">
                        @include('dashboard.vehiculos.partials.fields')
                        <div class="col-md-12 text-center mt-5">
                            <button class="btn btn-primary" type="submit" name="action">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
