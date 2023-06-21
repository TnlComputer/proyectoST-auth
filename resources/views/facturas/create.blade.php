@extends('adminlte::page')
@section('title', 'Orden de Compra - Alta')
@section('content_header')
<h1 class="m-0 text-dark">Factura - Alta</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('lineaFacs.store') }}" method="post">
            @csrf
            <div class="row">
                <x-adminlte-input type="date" label="Fecha Factura" fgroup-class="col-md-2"
                value="{{ old('fecFac') }}" name="fecFac" aria-describedby="helpId"
                placeholder="Fecha Factura"  />

                <x-adminlte-select2 name="tipo" label="Tipo" data-placeholder="Seleccione..." fgroup-class="col-md-2" >
                    <option value="{{ old('tipo') }}"></option>
                    <option value='A'>Anulada</option>
                    <option value='C'>Nota Credito</option>
                    <option value='D'>Nota Debito</option>
                    <option value='F' selected>Factura</option>
                </x-adminlte-select2>

                <x-adminlte-input type="text" label="Nro. Factura"  fgroup-class="col-md-2"
                value="{{ old('nroFac') }}" name="nroFac" aria-describedby="helpId"
                placeholder="Nro Factura" />
            </div>

            <div class="row">
                <x-adminlte-input type="number" Label="Cantidad" fgroup-class="col-md-2"
                value="{{ old('cantFac') }}" name="cantFac" aria-describedby="helpId" placeholder="Cantidad" required/>

                <x-adminlte-input type="number" step="any" label="Importe Factura" fgroup-class="col-md-2"
                value="{{ old('impFac') }}" name="impFac" aria-describedby="helpId"
                placeholder="Importa Factura" required />

                <x-adminlte-input type="number" label="Remito ST" fgroup-class="col-md-2"
                value="{{ old('remST') }}" name="remST" aria-describedby="helpId"
                placeholder="Remito ST" />

                <x-adminlte-select2 name="oc_id" label="Orden Compra" data-placeholder="Seleccione..." fgroup-class="col-md-2">
                    <option value="{{ old('oc_id') }}"></option>
                    <?php foreach ($Ocompras as $Ocompra) : ?>
                        <?php if ($Ocompra->cantOc > $Ocompra->cumplido ) { ?>
                            <option value="{{ $Ocompra->id }}">{{ $Ocompra->nroOc }}</option>
                        <?php } ?>
                    <?php endforeach; ?>
                </x-adminlte-select2>

                <x-adminlte-select2 name="remk_id" label="Remito Koinor" data-placeholder="Seleccione..." fgroup-class="col-md-2">
                    <option value="{{ old('remk_id') }}"></option>
                    <?php foreach ($Remitos as $Remito) : ?>
                        <?php if ($Remito->cantRemK > $Remito->cantUsada ) { ?>
                            <option value="{{ $Remito->id }}">{{ $Remito->nroRemK }}</option>
                        <?php } ?>
                    <?php endforeach; ?>
                </x-adminlte-select2>

                <button type="submit" class="btn btn-slim col-md-2">Agregar Linea</button>
            </div>

            {{-- <div class="row">
                <?php foreach ($LineaFacs as $LineaFac) : ?>
                    $totCantFac += $LineaFac->cantFac;
                    $totImpFac += $LineaFac->impFac;
                    <?php endforeach; ?>
                </div> --}}

                {{-- <div class="row">
                    <x-adminlte-input type="catTotalFac" step="any" label="Cantidad Total Factura." fgroup-class="col-md-2"
                    value="{{ $totImpFac }}" name="totCantFac" aria-describedby="helpId"
                    placeholder="Importa Factura" />

                    <x-adminlte-input type="impTotalFac" step="any" label="Importe Total Factura." fgroup-class="col-md-2"
                    value="{{ $totImpFac }}" name="totImpFac" aria-describedby="helpId"
                    placeholder="Importa Factura" />

                </div> --}}
            </form>
            <form action="{{ route('facturas.store') }}" method="post">

                @csrf

                <button type="submit" class="btn btn-primary">Generar</button>
                <a class="btn btn-primary" href="{{ route('remitos.index') }}" role="button">Cancelar</a>
            </form>
    </div>
</div>
@stop
