{{-- @extends('layouts.plantilla') --}}
@extends('adminlte::page')
@section('title', 'Depositos')
@section('content_header')
    <h1 class="m-0 text-dark">Depositos</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <x-adminlte-datatable id="table1" :heads="$heads" striped head-theme="dark" hoverable >
        <a name="" id="" class="btn btn-primary" href="{{ route('depositos.create') }}" role="button">Agregar Deposito</a>
            <?php foreach ($Depositos as $Deposito) : ?>
                <tr>
                    <td>{{ $Deposito->nroChq }}</td>
                    <td>{{ $Deposito->bancoChq }}</td>
                    <td>{{ $Deposito->fecChq }}</td>
                    <td>{{ $Deposito->impChq }}</td>
                    <td>{{ $Deposito->fecDpto }}</td>
                    <td>{{ $Deposito->cuentaDptoChq }}</td>
                    <td class="col-sm-6 d-flex">
                        <input type="hidden" name="depositado" value="SI">
                        <a name="editar" id="editar" class="btn btn-primary" href="{{ route('depositos.edit', $Deposito) }}" role="button"><img src="img/edit_16x16.gif" alt="Editar"></a>
                    </td>
                    <td>
                        <form action="{{ route('depositos.destroy', $Deposito) }}" method="post">
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
