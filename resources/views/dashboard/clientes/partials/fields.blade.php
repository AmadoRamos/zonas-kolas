<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
<div class="col-md-6 ">
    <label for="rv" class="form-label">RV</label>
     <input type="text" id="rv" name="rv" class="form-control" value="{{ $entity->rv ?? null }}" requried>
</div>
<div class="col-md-6 ">
    <label for="codigo" class="form-label">Codigo</label>
     <input type="text" id="codigo" name="codigo" class="form-control" value="{{ $entity->codigo ?? null }}" requried>
</div>
<div class="col-md-6 ">
    <label for="razon_social" class="form-label">Razon Social</label>
     <input type="text" id="razon_social" name="razon_social" class="form-control" value="{{ $entity->razon_social ?? null }}" requried>
</div>
<div class="col-md-6 ">
    <label for="nombre_establecimiento" class="form-label">Nombre Establecimiento</label>
     <input type="text" id="nombre_establecimiento" name="nombre_establecimiento" class="form-control" value="{{ $entity->nombre_establecimiento ?? null }}" requried>
</div>
