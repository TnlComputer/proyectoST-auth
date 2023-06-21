@extends('adminlte::page')

{{-- @section('title', 'AdminLTE') --}}

@section('content_header')
    <h1 class="m-0 text-dark"></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- <p class="mb-0">Bienvenido! {{  auth()->$User->name }}</p> --}}
                    {{-- <p class="mb-0">Bienvenido! {{ $user->name }}</p> --}}

                    @php
                        $type = 'danger';
                    @endphp

                    <x-alert2 :type="$type" id="alerta" class="mb4" role="prueba">
                        <x-slot name="title">
                            <p class="mb-0">Bienvenido {{ Auth::user()->name }}  !!!</p>
                        </x-slot>
                        <p>Usted tiene nivel de seguridad {{ Auth::user()->is_admin }}</p>
                    </x-alert2>

                </div>
            </div>
        </div>
    </div>
@stop
