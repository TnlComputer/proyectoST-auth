@extends('adminlte::page')
@section('title', 'Facturas')
@section('content_header')
    <h1 class="m-0 text-dark">Facturas</h1>
@stop

@section('content')
            <div class="card">
                <div class="card-body">
                                            <x-adminlte-datatable id="table1" :heads="$heads" :config="$config" striped head-theme="dark" hoverable >

        <a name="" id="" class="btn btn-primary" href="{{ route('facturas.create') }}" role="button">Agregar Factura</a>
                <?php foreach ($Facturas as $Factura) : ?>
                    <tr>
                        <td>{{ $Factura['fecFac'] }}</td>
                        <td>{{ $Factura['nroFac'] }}</td>
                        <td>{{ $Factura['cantFac'] }}</td>
                        <td>{{ $Factura['impFac'] }}</td>
                        <td>{{ $Factura['remST'] }}</td>
                        <td>{{ $Factura['nroOC'] }}</td>
                        <td>{{ $Factura['remK'] }}</td>
                        <td>{{ $Factura['imputado'] }}</td>
                        {{-- <td>{{ $Factura['pagado'] }}</td> --}}
                        <td class="col-sm-6 d-flex">
                            <a name="editar" id="editar" class=" " href="{{ route('facturas.edit', $Factura) }}"role="button"><button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit"><i class="fa fa-lg fa-fw fa-pen"></i></button></a>
                            <form action="{{ route('facturas.destroy', $Factura) }}" method="post">
                                @csrf
                                @method('delete')

                                <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                                </button>
                            </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </x-adminlte-datatable>
    </div>
</div>
@stop
