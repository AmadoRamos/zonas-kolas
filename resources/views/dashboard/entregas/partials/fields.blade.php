<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

<div class="col-md-12 ">
    <label for="vehiculo_codigo" class="form-label">Vehiculo</label>
     <input type="text" id="vehiculo_codigo" name="vehiculo_codigo" class="form-control" value="{{ $entity->vehiculo_codigo ?? null }}" list="datalistVehiculos" requried>
    <datalist id="datalistVehiculos">
        @foreach ($vehiculos as $vehiculo)
        <option value="{{ $vehiculo->code}}">{{ $vehiculo->nombre}}</option>
        @endforeach
    </datalist>
</div>
<div class="col-md-12 ">
    <label for="cliente_codigo" class="form-label">cliente</label>
     <input type="text" id="cliente_codigo" name="cliente_codigo" class="form-control" value="{{ $entity->cliente_codigo ?? null }}" list="datalistClientes" requried>
    <datalist id="datalistClientes">
        @foreach ($clientes as $cliente)
        <option value="{{ $cliente->codigo}}">{{ $cliente->nombre_establecimiento}}</option>
        @endforeach
    </datalist>
</div>
<div class="col-md-12">
    <label for="fecha" class="form-label">Fecha</label>
    <div class="input-group date">
        <input type="date" class="form-control" id="fecha" name="fecha" />
    </div>
</div>
