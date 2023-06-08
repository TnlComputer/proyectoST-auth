@extends('adminlte::page')
@section('title', 'Orden de Compra - Alta')
@section('content_header')
    <h1 class="m-0 text-dark">Orden de Compra - Alta</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('ocompras.store') }}" method="POST">

        @csrf

      <div class="mb-3">
        <label for="nroOc" class="form-label">Nro OC</label>
        @error('nroOc')
        <br><small>*{{ $message }}</small><br>
        @enderror
        <input type="text" class="form-control" name="nroOc"  aria-describedby="helpId"
          placeholder="Nro Orden de Compra" value="{{ old('nroOc') }}">
      </div>
      <div class="mb-3">
        <label for="fecOc" class="form-label">Fecha</label>
        @error('fecOc')
        <br><small>*{{ $message }}</small><br>
        @enderror
        <input type="date" class="form-control" name="fecOc" aria-describedby="helpId"
          placeholder="Fecha Orden de Compra" value="{{ old('fecOc') }}">
      </div>
      <div class="mb-3">
        <label for="cantOc" class="form-label">Cantidad</label>
        @error('cantOc')
        <br><small>*{{ $message }}</small><br>
        @enderror
        <input type="number" class="form-control" name="cantOc" aria-describedby="helpId" placeholder="Cantidad" value="{{ old('cantOc') }}">
      </div>
      <div class="mb-3">
        <label for="preUnitOc" class="form-label">Precio</label>
        @error('preUnitOc')
        <br><small>*{{ $message }}</small><br>
        @enderror
        <input type="number" step="any" class="form-control" name="preUnitOc" aria-describedby="helpId"
          placeholder="Precio" value="{{ old('preUnitOc') }}">
      </div>
       <button type="submit" class="btn btn-primary">Agregar</button>
      <a class="btn btn-primary" href="/ocompras" role="button">Cancelar</a>
    </form>
  </div>
  <div class="card-footer text-muted">
  </div>
</div>
    </div>
</div>
@stop
