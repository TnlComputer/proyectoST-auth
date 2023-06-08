@extends('adminlte::page')
@section('title', 'Remitos Koinor - Alta')
@section('content_header')
    <h1 class="m-0 text-dark">Remitos Koinor - Alta</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('remitos.store') }}" method="POST">

            @csrf

            <div class="row">
                <x-adminlte-input type="text" fgroup-class="col-md-6" name="nroRemK"  aria-describedby="helpId" label="Nro Remito" placeholder="Nro Remito Koinor" value="{{ old('nroRemK') }}" />
            </div>
            <div class="row">
                <x-adminlte-input type="date" fgroup-class="col-md-6" label="Fecha" name="fecRemK" aria-describedby="helpId"
                    placeholder="Fecha Remito Koinor" value="{{ old('fecRemK') }}" />
            </div>
            <div class="row">
                <x-adminlte-input type="number" fgroup-class="col-md-6" label="Cantidad" name="cantRemK" aria-describedby="helpId" placeholder="Cantidad" value="{{ old('cantRemK') }}" />
            </div>
            <div class="row">
                <x-adminlte-select2 name="ocompra" label="Orden Compra" data-placeholder="Seleccione..." fgroup-class="col-md-6">
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-info">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                </x-slot>
                <option/>
                <?php foreach ($Ocompras as $Ocompra) : ?>
                    <option>{{ $Ocompra->nroOc }}</option>
                <?php endforeach; ?>
            </x-adminlte-select2>
            </div>
                <button type="submit" class="btn btn-primary">Agregar</button>
                <a class="btn btn-primary" href="/remitos" role="button">Cancelar</a>
        </form>
    </div>
</div>
@stop
