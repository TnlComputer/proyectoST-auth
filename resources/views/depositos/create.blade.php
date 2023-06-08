@extends('adminlte::page')
@section('title', 'Depositar')
@section('content_header')
    {{-- <h1 class="m-0 text-dark">Cheques</h1> --}}
@stop

@section('content')
<div class="card">
    <div class="card-body">

<div class="card w-25 mt-5">
  <div class="card-header">
   Deposito
  </div>
  <div class="card-body">
    <form action="{{ route('depositos.store') }}" method="POST">

        @csrf

      <div class="mb-3">
        <label for="nroChq" class="form-label">Nro Chq</label>
        @error('nroChq')
        <br><small>*{{ $message }}</small><br>
        @enderror
        <input type="text" class="form-control" name="nroChq"  aria-describedby="helpId"
          placeholder="Nro Cheque" value="{{ old('nroChq') }}">
      </div>
            <div class="mb-3">
        <label for="bancoChq" class="form-label">Banco</label>
        @error('cuentaDptoChq')
        <br><small>*{{ $message }}</small><br>
        @enderror
        <input type="text" class="form-control" name="bancoChq" aria-describedby="helpId"
          placeholder="Banco del Cheque" value="{{ old('bancoChq') }}">
      </div>

      <div class="mb-3">
        <label for="fecChq" class="form-label">Fecha Cheque</label>
        @error('fecChq')
        <br><small>*{{ $message }}</small><br>
        @enderror
        <input type="date" class="" name="fecChq" aria-describedby="helpId"
          placeholder="Fecha Cheque" value="{{ old('fecChq') }}">
      </div>
      <div class="mb-3">
        <label for="impChq" class="">Importe</label>
        @error('impChq')
        <br><small>*{{ $message }}</small><br>
        @enderror
        <input type="number" step="any" class="" name="impChq" aria-describedby="helpId" placeholder="Importe Cheque" value="{{ old('impChq') }}">
      </div>
              <label for="fecDpto" class="form-label">Fecha Deposito</label>
        @error('fecDpto')
        <br><small>*{{ $message }}</small><br>
        @enderror
        <input type="date" class="" name="fecDpto" aria-describedby="helpId"
          placeholder="Fecha Deposito" value="{{ old('fecDpto') }}">
      </div>

      <div class="mb-3">
        <label for="cuentaDptoChq" class="form-label">Cuenta Deposito</label>
        @error('cuentaDptoChq')
        <br><small>*{{ $message }}</small><br>
        @enderror
        <input type="text" class="form-control" name="cuentaDptoChq" aria-describedby="helpId"
          placeholder="Cuenta Deposito" value="{{ old('cuentaDptoChq') }}">
      </div>
       <button type="submit" class="btn btn-primary">Agregar</button>
      <a class="btn btn-primary" href="/depositos" role="button">Cancelar</a>
    </form>
  </div>
  <div class="card-footer text-muted">
  </div>
</div>

@endsection
