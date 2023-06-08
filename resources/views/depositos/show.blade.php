@extends('layouts.plantilla')

@section('title', 'Orden de compra')

@section('content')

<div class="card w-25 mt-2 ml-50">
  <div class="card-header">
    Orden de Compra
  </div>
  <div class="card-body">
    <form action="{{ route('ocompras.edit', $Ocompra->id) }}" method="post">

        @csrf

      <div class="mb-3">
        <label for="nro_oc" class="form-label">Nro OC</label>
        <input type="text" class="form-control"
        value="{{ old('nro_oc', $Ocompra->nroOc) }}" name="nro_oc" aria-describedby="helpId"
          placeholder="Nro Orden de Compra">
      </div>
      <div class="mb-3">
        <label for="fecha_oc" class="form-label">Fecha</label>
        <input type="date" class="form-control"
        value="{{ old('fecha_oc',  $Ocompra->fecOc) }}" name="fecha_oc" aria-describedby="helpId"
          placeholder="Fecha Orden de Compra" '>
      </div>
      <div class="mb-3">
        <label for="cant_oc" class="form-label">Cantidad</label>
        <input type="number" class="form-control"
        value="{{ old('cant_oc', $Ocompra->cantOc) }}" name="cant_oc" aria-describedby="helpId" placeholder="Cantidad">
      </div>
      <div class="mb-3">
        <label for="precio_oc" class="form-label">Precio</label>
        <input type="number" step="any" class="form-control"
        value="{{ old('precio_oc', $Ocompra->preUnitOc) }}" name="precio_oc" aria-describedby="helpId"
          placeholder="Precio">
      </div>
      <div class="mb-3">
        <label for="cumplido_oc" class="form-label">Cumplido</label>
        <input type="number" class="form-control"
        value="{{ old('cumplido_oc', $Ocompra->cumplido) }}" name="cumplido_oc" aria-describedby="helpId"
          placeholder="Cantidad Cumplida">
      </div>
       <button type="submit" class="btn btn-success">Actualizar</button>
      <a class="btn btn-primary" href="{{ route('ocompras.index') }}" role="button">Cancelar</a>
    </form>
  </div>
  <div class="card-footer text-muted">
  </div>
</div>

@endsection
