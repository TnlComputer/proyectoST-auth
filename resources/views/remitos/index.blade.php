@extends('adminlte::page')
@section('title', 'Remitos Koinor')
@section('content_header')
<p class="text-dark">Remitos Koinor</p>
@stop

@section('content')
<div class="card">
    <div class="card-body">
      <x-adminlte-datatable id="table7" :heads="$heads" head-theme="dark" :config="$config" class="bg-light" striped hoverable >
      <a name="" id="" class="btn btn-primary" href="{{ route('remitos.create') }}" role="button">Agregar Remito</a>

      <?php  foreach ($Remitos as $Remito) : ?>
        <tr>
          <td>{{ $Remito->fecRemK }}</td>
          <td>{{ $Remito->nroRemK }}</td>
          <td>{{ $Remito->cantRemK }}</td>
          <td>{{ $Remito->cantUsada }}</td>
          <td>{{ $Remito->ocompra }}</td>
          <td class="col-sm-6 d-flex">
            <a name="editar" id="editar" class=" " href="{{ route('remitos.edit', $Remito) }}"role="button"><button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit"><i class="fa fa-lg fa-fw fa-pen"></i></button></a>
            <form action="{{ route('remitos.destroy', $Remito) }}" method="post">
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
