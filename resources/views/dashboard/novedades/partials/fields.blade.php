<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

<div class="col-md-12 ">
    <label for="cliente" class="form-label">cliente</label>
     <input type="text" id="cliente" name="cliente_codigo" class="form-control" value="{{ $entity->cliente_codigo ?? null }}" list="datalistClientes" requried>
    <datalist id="datalistClientes">
        @foreach ($clientes as $cliente)
        <option value="{{ $cliente->codigo}}">{{ $cliente->nombre_establecimiento}}</option>
        @endforeach
    </datalist>
</div>
<div class="col-md-12 ">
    <label for="producto" class="form-label">Producto</label>
     <input type="text" id="producto" name="producto" class="form-control" value="{{ $entity->producto ?? null }}" requried>
</div>
<div class="col-md-12 ">
    <label for="motivo" class="form-label">Motivo</label>
     <input type="text" id="motivo" name="motivo" class="form-control" value="{{ $entity->motivo ?? null }}" requried>
</div>
