<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

<div class="col-md-12 ">
    <label for="code" class="form-label">Codigo</label>
     <input type="text" id="code" name="code" class="form-control" value="{{ $entity->code ?? null }}" requried>
</div>
<div class="col-md-12 ">
    <label for="zona" class="form-label">Zona</label>
     <input type="text" id="zona" name="zona" class="form-control" value="{{ $entity->zona ?? null }}" requried>
</div>
<div class="col-md-12 ">
    <label for="celular" class="form-label">Celular</label>
     <input type="text" id="celular" name="celular" class="form-control" value="{{ $entity->celular ?? null }}" requried>
</div>
<div class="col-md-12 ">
    <label for="nombre" class="form-label">Nombre</label>
     <input type="text" id="nombre" name="nombre" class="form-control" value="{{ $entity->nombre ?? null }}" requried>
</div>
