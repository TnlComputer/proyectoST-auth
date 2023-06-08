{{-- @extends('layouts.plantilla') --}}
@extends('adminlte::page')
@section('title', 'Ordenes de compras')
@section('content_header')
    <h1 class="m-0 text-dark">Ordenes de Compras</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <x-adminlte-datatable id="table1" :heads="$heads" :config="$config" striped head-theme="dark" hoverable >
                <a name="" id="" class="btn btn-primary" href="{{ route('ocompras.create') }}" role="button">Agregar Orden</a>
                <?php foreach ($Ocompras as $Ocompra) : ?>
                    <tr>
                        <td>{{ $Ocompra->fecOc }}</td>
                        <td>{{ $Ocompra->nroOc }}</td>
                        <td>{{ $Ocompra->cantOc }}</td>
                        <td>{{ $Ocompra->cumplido }}</td>
                        <td>{{ $Ocompra->preUnitOc }}</td>
                        <td class="col-sm-6 d-flex">
                            <a name="editar" id="editar" class=" " href="{{ route('ocompras.edit', $Ocompra) }}"role="button">
                            <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit"><i class="fa fa-lg fa-fw fa-pen"></i></button></a>
                            <form action="{{ route('ocompras.destroy', $Ocompra) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </x-adminlte-datatable>
        </div>
    </div>
@stop
