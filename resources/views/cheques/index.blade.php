@extends('adminlte::page')
@section('title', 'Cheques')
@section('content_header')
    {{-- <h1 class="m-0 text-dark">Cheques</h1> --}}
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <a name="" id="" class="btn btn-primary" href="{{ route('cheques.create') }}" role="button">Agregar Cheque</a>
        <x-adminlte-datatable id="table1" :heads="$heads" :config="$config" striped head-theme="dark" hoverable  >
            <?php foreach ($Cheques as $Cheque) : ?>
                <tr>
                    <td>{{ $Cheque['bancoChq'] }}</td>
                    <td>{{ $Cheque['nroChq'] }}</td>
                    <td>{{ $Cheque['fecChq'] }}</td>
                    <td>{{ $Cheque['impChq'] }}</td>
                    <td>{{ $Cheque['cobrado'] }}</td>
                    <td>{{ $Cheque['gastos'] }}</td>
                    <td>{{ $Cheque['obsChq'] }}</td>
                    {{-- <td>{{ $Cheque['imputado'] }}</td> --}}
                    {{-- <td>{{ $Cheque['depositado'] }}</td> --}}
                    <td class="col-sm-6 d-flex">
                        <a name="editar" id="editar" class=" " href="{{ route('cheques.edit', $Cheque) }}" role="button">
                        <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit"><i class="fa fa-lg fa-fw fa-pen"></i></button></a>

                        <form action="{{ route('cheques.destroy', $Cheque) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-xs btn-default text-danger mx-1 shadow ali" title="Delete">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>
                        </form>

                        @if ($Cheque['depositado'] != 'SI'  )
                            <form action="{{ route('cheques.update', $Cheque) }}" method="post">
                                @csrf
                                @method('put')
                                <input type="hidden" name="bancoChq" value="{{ $Cheque['bancoChq'] }}">
                                <input type="hidden" name="nroChq" value="{{ $Cheque['nroChq'] }}">
                                <input type="hidden" name="fecChq" value="{{ $Cheque['fecChq'] }}">
                                <input type="hidden" name="impChq" value="{{ $Cheque['impChq'] }}">
                                <input type="hidden" name="depositado" value="SI">

                                <button type="submit" class="btn btn-xs btn-default text-primary mx-1 shadow ali" title="Depositar">
                                    <i class="fa fa-lg fa-fw fa-university"></i>
                                </button>
                            </form>
                        @endif

                        @if ($Cheque['cobrado'] == 'NULL' OR  $Cheque['cobrado'] == '' AND $Cheque['depositado'] =='SI')
                            <form action="{{ route('cheques.update', $Cheque) }}" method="post">
                                @csrf
                                @method('put')
                                <input type="hidden" name="bancoChq" value="{{ $Cheque['bancoChq'] }}">
                                <input type="hidden" name="nroChq" value="{{ $Cheque['nroChq'] }}">
                                <input type="hidden" name="fecChq" value="{{ $Cheque['fecChq'] }}">
                                <input type="hidden" name="impChq" value="{{ $Cheque['impChq'] }}">
                                <input type="hidden" name="cobrado" value="SI">

                                <button type="submit" class="btn btn-xs btn-default text-teal mx-1 shadow ali" title="Acreditar">
                                    <i class="fa fa-lg fa-fw fa-university"></i>
                                </button>
                            </form>

                            <form action="{{ route('cheques.update', $Cheque) }}" method="post">
                                @csrf
                                @method('put')
                                <input type="hidden" name="bancoChq" value="{{ $Cheque['bancoChq'] }}">
                                <input type="hidden" name="nroChq" value="{{ $Cheque['nroChq'] }}">
                                <input type="hidden" name="fecChq" value="{{ $Cheque['fecChq'] }}">
                                <input type="hidden" name="impChq" value="{{ $Cheque['impChq'] }}">
                                <input type="hidden" name="cobrado" value="RECHAZADO">

                                <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow ali" title="Rechazar">
                                    <i class="fa fa-lg fa-fw fa-university"></i>
                                </button>
                                </form>
                            @endif

                        {{-- <a name="edit" id="edit" class=" " href="{{ route('cheques.update', $Cheque) }}" role="button">
                        <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Acreditar"><i class="fa fa-lg fa-fw fa-university"></i></button></a>

                        <a name="bad" id="bad" class=" " href="{{ route('cheques.update', $Cheque) }}" role="button">
                        <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Rechazar"><i class="fa fa-lg fa-fw fa-university"></i></button></a> --}}
                    </td>
                </tr>
            <?php endforeach; ?>
        </x-adminlte-datatable>
    </div>
</div>
@stop
