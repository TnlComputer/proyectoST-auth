{{-- @extends('layouts.plantilla') --}}
@extends('adminlte::page')
@section('title', 'Imputaciones')
@section('content_header')
    <h1 class="m-0 text-dark">Imputaciones</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
         <x-adminlte-datatable id="table1" :heads="$heads" :config="$config" striped head-theme="dark" hoverable >
            <a name="" id="" class="btn btn-primary" href="{{ route('imputaciones.create') }}" role="button">Imputar</a>
            <?php foreach ($Imputaciones as $Imputacion) : ?>
                <tr>
                    <td>{{ $Imputacion['fecImp'] }}</td>
                    <td>{{ $Imputacion['impChqImp'] }}</td>
                    <td>{{ $Imputacion['fac_id'] }}</td>
                    <td>{{ $Imputacion['chq_id'] }}</td>
                    <td>{{ $Imputacion['impChq'] }}</td>
                    <td>{{ $Imputacion['impFac'] }}</td>
                    <td class="col-sm-6 d-flex">
                        <a name="editar" id="editar" class="" href="{{ route('imputaciones.edit', $Imputacion) }}" role="button">
                        <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </button></a>

                        <form action="{{ route('imputaciones.destroy', $Imputacion) }}" method="post">
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
