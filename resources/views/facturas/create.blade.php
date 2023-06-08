@extends('adminlte::page')
@section('title', 'Orden de Compra - Alta')
@section('content_header')
<h1 class="m-0 text-dark">Factura - Alta</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('facturas.store') }}" method="post">

            @csrf

            <div class="row">
                <x-adminlte-input type="date" label="Fecha Factura" fgroup-class="col-md-6"
                value="{{ old('fecFac') }}" name="fecFac" aria-describedby="helpId"
                placeholder="Fecha Factura" />
            </div>

            <div class="row">
                <x-adminlte-input type="text" label="Nro. Factura"  fgroup-class="col-md-6"
                value="{{ old('nroFac') }}" name="nroFac" aria-describedby="helpId"
                placeholder="Nro Factura" />
            </div>

            <div class="row">
                <x-adminlte-input type="number" Label="Cantidad" fgroup-class="col-md-6"
                value="{{ old('cantFac') }}" name="cantFac" aria-describedby="helpId" placeholder="Cantidad" />
            </div>

            <div class="row">
                <x-adminlte-input type="number" step="any" label="Importe Factura." fgroup-class="col-md-6"
                value="{{ old('impFac') }}" name="impFac" aria-describedby="helpId"
                placeholder="Importa Factura" />
            </div>

            <div class="row">
                <x-adminlte-input type="number" label="Remito ST" fgroup-class="col-md-6"
                value="{{ old('remitoST') }}" name="remST" aria-describedby="helpId"
                placeholder="Remito ST" />
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

            <div class="row">
                <x-adminlte-select2 name="remK" label="Remito Koinor" data-placeholder="Seleccione..." fgroup-class="col-md-6">
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-info">
                        <i class="fas fa-receipt"></i>
                    </div>
                </x-slot>
                <option/>
                <?php foreach ($Remitos as $Remito) : ?>
                    <option>{{ $Remito->nroRemK }}</option>
                <?php endforeach; ?>
            </x-adminlte-select2>
            </div>

            <button type="submit" class="btn btn-primary">Agregar</button>
            <a class="btn btn-primary" href="{{ route('remitos.index') }}" role="button">Cancelar</a>
        </form>
    </div>
</div>
@stop

