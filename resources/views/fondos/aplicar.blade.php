{{-- @extends('layouts.plantilla') --}}
@extends('adminlte::page')
@section('title', 'Imputaciones')
@section('content_header')
    <h1 class="m-0 text-dark">Imputaciones</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <x-adminlte-datatable id="table7" :heads="$heads" :config="$config" striped head-theme="dark" hoverable>
            <a name="" id="" class="btn btn-primary" href="{{ route('imputaciones.create') }}" role="button">Imputar</a>
            <?php foreach ($Imputaciones as $Imputacion) : ?>
                <tr>
                    <td>{{ $Imputacion['nroFac'] }}</td>
                    <td>{{ $Imputacion['fecFac'] }}</td>
                    <td>{{ $Imputacion['impFac'] }}</td>
                    {{-- <td>{{ $Imputacion['ncred'] }}</td>
                    <td>{{ $Imputacion['fecNcred'] }}</td> --}}
                    <td>{{ $Imputacion['fecChq'] }}</td>
                    <td>{{ $Imputacion['banco'] }}</td>
                    <td>{{ $Imputacion['nroChq'] }}</td>
                    <td>{{ $Imputacion['impChq'] }}</td>
                    <td>{{ $Imputacion['impImputado'] }}</td>
                    <td><a name="editar" id="editar" class="btn btn-primary" href="{{ route('imputaciones.edit', $Imputacion) }}" role="button"><img src="img/edit_16x16.gif" alt="Editar"></a>
                     </td>
                    <td class="col-sm-6 d-flex">
                        <form action="{{ route('imputaciones.destroy', $Imputacion) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"><img src="img/borrar.gif" alt="Borrar"></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </x-adminlte-datatable>
    </div>
</div>
@stop
