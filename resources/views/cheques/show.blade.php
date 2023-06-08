@extends('adminlte::page')
@section('title', 'Remitos Koinor - Alta')
@section('content_header')
<h1 class="m-0 text-dark">Cheque</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('cheques.update', $Cheque) }}" method="POST">

            @csrf
            @method('put')

            <div class="row"">
                <x-adminlte-input type="text" label="Banco"  fgroup-class="col-md-6" name="bancoChq"  aria-describedby="helpId" placeholder="Banco" value="{{ old('bancoChq', $Cheque->bancoChq) }}" />
            </div>
            <div class="row"">
                <x-adminlte-input type="text" label="Nro Cheque" fgroup-class="col-md-6" name="nroChq"  aria-describedby="helpId" placeholder="Nro Cheque" value="{{ old('nroCheq', $Cheque->nroChq) }}" />
            </div>

            <div class="row"">
                <x-adminlte-input type="date" label="Fecha" fgroup-class="col-md-6" name="fecChq" aria-describedby="helpId" placeholder="Fecha Cheque"  value="{{ old('fecChq', $Cheque->fecChq) }}" />
            </div>

            <div class="row"">
                <x-adminlte-input type="number" step="any" label="Importe"  fgroup-class="col-md-6" name="impChq" aria-describedby="helpId" placeholder="Importe" value="{{ old('impChq', $Cheque->impChq) }}" />
            </div>

            <div class="row">
                <x-adminlte-textarea label="Observaciones" fgroup-class="col-md-6" name="obsChq" id="" cols="30" rows="3">{{ old('obsChq', $Cheque->obsChq) }}
                </x-adminlte-textarea>
            </div>

            <input type="hidden" name="origen" value="edit">

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a class="btn btn-primary" href="{{ route('cheques.index') }}" role="button">Cancelar</a>
        </form>
    </div>
    </div>
@stop
