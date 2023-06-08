@extends('adminlte::page')
@section('title', 'Facturas')
@section('content_header')
    <h1 class="m-0 text-dark">Orden de Compra - Edit</h1>
@stop

@section('content')
            <div class="card">
                <div class="card-body">
    Orden de Compra - Edit
  </div>
  <div class="card-body">
    <form action="{{ route('ocompras.update', $Ocompra) }}" method="post">

        @csrf

        @method('put')

      <div class="mb-3">
        <label for="nroOc" class="form-label">Nro OC</label>
        <input type="text" class="form-control"
        value="{{ old('nroOc', $Ocompra->nroOc) }}" name="nroOc" aria-describedby="helpId"
          placeholder="Nro Orden de Compra">
      </div>
      <div class="mb-3">
        <label for="fecOc" class="form-label">Fecha</label>
        <input type="date" class="form-control"
        value="{{ old('fecOc',  $Ocompra->fecOc) }}" name="fecOc" aria-describedby="helpId"
          placeholder="Fecha Orden de Compra" '>
      </div>
      <div class="mb-3">
        <label for="cantOc" class="form-label">Cantidad</label>
        <input type="number" class="form-control"
        value="{{ old('cantOc', $Ocompra->cantOc) }}" name="cantOc" aria-describedby="helpId" placeholder="Cantidad">
      </div>
      <div class="mb-3">
        <label for="preUnitOc" class="form-label">Precio</label>
        <input type="number" step="any" class="form-control"
        value="{{ old('preUnitOc', $Ocompra->preUnitOc) }}" name="preUnitOc" aria-describedby="helpId"
          placeholder="Precio">
      </div>
      <div class="mb-3">
        <label for="cumplido" class="form-label">Cumplido</label>
        <input type="number" class="form-control"
        value="{{ old('cumplido', $Ocompra->cumplido) }}" name="cumplido" aria-describedby="helpId"
          placeholder="Cantidad Cumplida">
      </div>
       <button type="submit" class="btn btn-success">Actualizar</button>
      <a class="btn btn-primary" href="{{ route('ocompras.index') }}" role="button">Cancelar</a>
    </form>
  </div>
  <div class="card-footer text-muted">
  </div>
</div>

{{-- @endsection --}}
    </div>
</div>
@stop
