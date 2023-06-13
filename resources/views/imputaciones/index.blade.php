{{-- @extends('layouts.plantilla') --}}
@extends('adminlte::page')
@section('title', 'Imputaciones')
@section('content_header')
    <h1 class="m-0 text-dark">Imputaciones</h1>
@stop

@section('content')
<div class="card">
    <div class="d-flex" >
        <div class="card-body col-sm-6">
            <x-adminlte-datatable  id="table1" :heads="$headsF" :config="$configF" striped head-theme="dark" hoverable >
                <?php foreach ($Facturas as $Factura) : ?>
                    <tr>
                        <td>
                            <form action="" method="post">
                                {{-- @csrf --}}
                                {{-- @method('delete') --}}
                                <button class="btn btn-xs btn-default text-green mx-1 shadow" title="Seleccionar Factura">
                                    <i class="fa fa-lg fa-fw fa-plus"></i>
                                </button>
                            </form>
                        </td>
                        <td>{{ $Factura['fecFac'] }}</td>
                        <td>{{ $Factura['nroFac'] }}</td>
                        <td>{{ $Factura['impFac'] }}</td>
                        <td>{{ $Factura['pagado'] }}</td>
                    </tr>
                <?php endforeach ?>
            </x-adminlte-datatable>
        </div>
        {{-- <div class="  col-sm-6 d-flex" > --}}
        <div class="card-body  col-sm-6">
            <x-adminlte-datatable id="table2" :heads="$headsC" :config="$configC" striped head-theme="dark" hoverable >
                <?php foreach ($Cheques as $Cheque) : ?>
                    <tr>
                        <form action="" method="post">
                            {{-- @csrf --}}
                            {{-- @method('delete') --}}
                            <td>{{ $Cheque['fecChq'] }}</td>
                            <td>{{ $Cheque['bancoChq'] }}</td>
                            <td>{{ $Cheque['nroChq'] }}</td>
                            <td><input type="number" step="01" value="{{ $Cheque['impChq'] }}" name='impChq'</td>
                            <td>
                                <button class="btn btn-sm btn-default text-primary mx-1 shadow" title="Imputar cheque">Imputar
                                </button>
                            </td>
                        </form>
                    </tr>
                <?php endforeach ?>
            </x-adminlte-datatable>
        </div>
    </div>
</div>
</div>
@stop

{{-- </div> --}}
