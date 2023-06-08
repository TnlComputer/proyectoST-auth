@extends('layouts.plantilla')

@section('title', 'Orden de compra')

@section('content')

<div class="card w-25 mt-2 ml-50">
  <div class="card-header">
    Deposito
  </div>
  <div class="card-body">
    <form action="{{ route('depositos.update', $Deposito) }}" method="post">

        @csrf

        @method('put')

      <div class="mb-3">
        <label for="nroChq" class="">Nro Chque</label>
        <input type="text" class=""
        value="{{ old('nroChq', $Deposito->nroChq) }}" name="nroChq" aria-describedby="helpId"
          placeholder="Nro Cheque">
      </div>
      <div class="mb-3">
        <label for="fecChq" class="">Fecha</label>
        <input type="date" class=""
        value="{{ old('fecChq',  $Deposito->fecChq) }}" name="fecChq" aria-describedby="helpId"
          placeholder="Fecha Orden de Compra" '>
      </div>
      <div class="mb-3">
        <label for="impChq" class="">Importe</label>
        <input type="number" step="any" class=""
        value="{{ old('impChq', $Deposito->impChq) }}" name="impChq" aria-describedby="helpId" placeholder="Importe Cheque">
      </div>
      <div class="mb-3">
        <label for="fecDpto" class="">Fecha Deposito</label>
        <input type="date" class=""
        value="{{ old('fecDpto', $Deposito->fecDpto) }}" name="fecDpto" aria-describedby="helpId"
          placeholder="Fecha Deposito">
      </div>
      <div class="mb-3">
        <label for="cuentaDptoChq" class="">Cuenta Deposiado</label>
        <input type="text" class=""
        value="{{ old('cuentaDptoChq', $Deposito->cuentaDptoChq) }}" name="cuentaDptoChq" aria-describedby="helpId"
          placeholder="Cuenta Depositado">
      </div>
       <button type="submit" class="btn btn-success">Actualizar</button>
      <a class="btn btn-primary" href="{{ route('depositos.index') }}" role="button">Cancelar</a>
    </form>
  </div>
  <div class="card-footer text-muted">
  </div>
</div>

@endsection
