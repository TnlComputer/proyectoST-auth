@extends('adminlte::page')
@section('title', 'Imputaciones')
@section('content_header')
    <h1 class="m-0 text-dark">Imputaciones</h1>
@stop

@section('content')
<div class="card">
    <div class="d-flex" >
        <div class="card-body">
            <x-adminlte-datatable  id="table1" :heads="$headsF" :config="$configF" striped head-theme="dark" hoverable >
                <?php foreach ($Facturas as $Factura) : ?>
                    {{-- {{ $notificacion}} --}}
                    <tr>
                        <form action="{{  route('imputaciones.create') }}" method="post">
                            @csrf
                            {{-- @method('put') --}}
                            <td>{{ $Factura['fecFac'] }}</td>
                            <td>{{ $Factura['nroFac'] }}</td>
                            <td>{{ $Factura['impFac'] }}</td>
                            <td>{{ $Factura['pagado'] }}</td>
                            <input type="hidden" name="fac_id" value="{{ $Factura['id'] }}">
                            <input type="hidden" name="fecFac" value="{{ $Factura['fecFac'] }}">
                            <input type="hidden" name="nroFac" value="{{ $Factura['nroFac'] }}">
                            <input type="hidden" name="impFac" value="{{ $Factura['impFac'] }}">
                            <input type="hidden" name="pagado" value="{{ $Factura['pagado'] }}">
                            

                            <td><x-adminlte-select2 name="chq_id"  data-placeholder="Seleccione..." >
                                {{-- <x-slot name="prependSlot">
                                    </div>
                                </x-slot> --}}
                                <option value="Seleccione Cheque..."></option>
                                <?php foreach ($Cheques as $Cheque) : ?>
                                    <option value="{{ $Cheque->id }}">{{ $Cheque->fecChq }} - {{ $Cheque->bancoChq }} - {{ $Cheque->nroChq }} - {{ $Cheque->impChq }} "</option>
                                <?php endforeach; ?>
                                </x-adminlte-select2>
                            </td>
                            <td>
                                <input type="hidden" name="impChq" value="{{ $Cheque['impChq'] }}">
                                <x-adminlte-input type="number" name="impChqImp" placeholder="Importe a Imputar" value="{{ $Factura['impFac'] }}" />
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary" role="button" title="Imputar">Imputar</button>
                            </td>
                        </form>
                    </tr>
                <?php endforeach ?>
            </x-adminlte-datatable>
        </div>
    </div>
</div>
@stop

