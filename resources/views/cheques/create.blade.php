@extends('adminlte::page')
@section('title', 'Remitos Koinor - Alta')
@section('content_header')
<h1 class="m-0 text-dark">Cheques - Alta</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('cheques.store') }}" method="POST">

            @csrf

            <div class="row">
                <x-adminlte-input type="text" label="Banco" fgroup-class="col-md-6" name="bancoChq"  aria-describedby="helpId"
                placeholder="Banco" value="{{ old('bancoChq') }}" />
            </div>

            <div class="row">
                <x-adminlte-input type="text" label="Nro Cheque" fgroup-class="col-md-6" name="nroChq"  aria-describedby="helpId"
                placeholder="Nro Cheque" value="{{ old('nroCheq') }}" />
            </div>

            <div class="row">
                <x-adminlte-input type="date" label="Fecha" fgroup-class="col-md-6" name="fecChq" aria-describedby="helpId" placeholder="Fecha Cheque"  value="{{ old('fecChq') }}" />
            </div>

            <div class="row">
                <x-adminlte-input type="number" step="any" label="Importe" fgroup-class="col-md-6" name="impChq" aria-describedby="helpId"
                placeholder="Importe" value="{{ old('impChq') }}" />
            </div>


            <div class="row">
                <x-adminlte-textarea label="Obsercaciones" fgroup-class="col-md-6" name="obsChq" id="" cols="30" rows="3">{{ old('obsChq') }}</x-adminlte-textarea>
            </div>

            <button type="submit" class="btn btn-primary">Agregar</button>
            <a class="btn btn-primary" href="{{ route('cheques.index') }}" role="button">Cancelar</a>
        </form>
    </div>
</div>
@stop

