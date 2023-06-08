@extends('layouts.plantilla')

@section('title', 'Remitos')

@section('content')

<div class="card w-25 mt-5">
  <div class="card-header">
    Remitos Koinor
  </div>
  <div class="card-body">
    <form action="{{ route('ocompras.store') }}" method="POST">

        @csrf

        @method('put')

      <div class="mb-3">
        <label for="nroOc" class="form-label">Nro Remito</label>
        @error('nroRemK')
        <br><small>*{{ $message }}</small><br>
        @enderror
        <input type="text" class="form-control" name="nroRemK"  aria-describedby="helpId"
          placeholder="Nro Remito Koinor" value="{{ old('nroRemK') }}">
      </div>
      <div class="mb-3">
        <label for="fecRemK" class="form-label">Fecha</label>
        @error('fecRemK')
        <br><small>*{{ $message }}</small><br>
        @enderror
        <input type="text" class="form-control
        <input type="date" class="form-control" name="fecRemK" aria-describedby="helpId"
          placeholder="Fecha Remito" value="{{ old('fecOc') }}">
      </div>
      <div class="mb-3">
        <label for="cantRemK" class="form-label">Cantidad</label>
        @error('cantRemK')
        <br><small>*{{ $message }}</small><br>
        @enderror
        <input type="number" class="form-control" name="cantRemK" aria-describedby="helpId" placeholder="Cantidad" value="{{ old('cantRemK') }}">
      </div>
      <div class="mb-3">
        <label for="cantUsada" class="form-label">Precio</label>
        @error('cantUsada')
        <br><small>*{{ $message }}</small><br>
        @enderror
        <input type="number" class="form-control" name="cantUsada" aria-describedby="helpId"
          placeholder="Precio" value="{{ old('cantUsada') }}">
      </div>
       <button type="submit" class="btn btn-primary">Actualizar</button>
      <a class="btn btn-primary" href="/ocompras" role="button">Cancelar</a>
    </form>
  </div>
  <div class="card-footer text-muted">
  </div>
</div>

@endsection
