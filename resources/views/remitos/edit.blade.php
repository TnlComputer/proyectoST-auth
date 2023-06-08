@extends('adminlte::page')
@section('title', 'Remitos Koinor - Alta')
@section('content_header')
    <h1 class="m-0 text-dark">Remitos Koinor - Edit</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('remitos.update', $Remito) }}" method="POST">

            @csrf

            @method('put')

            <div class="row"">
                <x-adminlte-input type="text" fgroup-class="col-md-6"  label="Remito Koinor" name="nroRemK"  aria-describedby="helpId"
                placeholder="Nro Remito Koinor" value="{{ old('nroRemK', $Remito->nroRemK) }}" />
            </div>
            <div class="row">
                <x-adminlte-input type="date" fgroup-class="col-md-6" label="Fecha" name="fecRemK" aria-describedby="helpId"
                placeholder="Fecha Remito" value="{{ old('fecRemK', $Remito->fecRemK) }}" />
            </div>
            <div class="row">
                <x-adminlte-input type="number" fgroup-class="col-md-6" label="Cantidad" name="cantRemK" aria-describedby="helpId" placeholder="Cantidad" value="{{ old('cantRemK', $Remito->cantRemK) }}" />
            </div>
            <div class="row">
                <x-adminlte-input type="number" fgroup-class="col-md-6" label="Usado" name="cantUsada" aria-describedby="helpId"
                placeholder="Precio" value="{{ old('cantUsada', $Remito->cantUsada) }}" />
            </div>
            <div class="row">
                <x-adminlte-select2 name="ocompra"  label="Orden Compra" data-placeholder="Seleccine..." fgroup-class="col-md-6">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </x-slot>
                    <option value="{{ $Remito->ocompra }}" selected="selected">{{ $Remito->ocompra }}</option>
                    <?php foreach ($Ocompras as $Ocompra) : ?>
                        <option value="{{ $Ocompra->nroOc }}">{{ $Ocompra->nroOc }}</option>
                    <?php endforeach; ?>
                </x-adminlte-select2>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a class="btn btn-primary" href="{{ route('remitos.index') }}" role="button">Cancelar</a>
        </form>
    </div>
</div>
@stop

