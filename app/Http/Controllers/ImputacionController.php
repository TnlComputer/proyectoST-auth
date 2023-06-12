<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImputacion;
use Illuminate\Http\Request;
use App\Models\Cheque;
use App\Models\Factura;
use App\Models\Imputacion;

class ImputacionController extends Controller
{
    public function index()
    {
        $Imputaciones = Imputacion::all();

        $heads = [
            // 'Nro Fac',
            'Fecha',
            'Imp Imput.Fac',
            // 'NC',
            // 'Fecha NC',
            'ID Fac ',
            'ID Chq',
            'Imp Chq',
            'Imp Fac',
            ['label' => 'Acciones', 'no-export' => true, 'width' => 6, 'class' => 'text-center'],
        ];

        $config = [
            'order' => [[0, 'desc']],
            'columns' => [null, null, null, null, null, null, ['orderable' => false]],
        ];

        // return view('imputaciones.index', compact('Imputaciones'));
        return view('imputaciones.index', compact('Imputaciones', 'heads', 'config'));
    }

    public function store(StoreImputacion $request)
    {
        // validacion de datos si no usamos formRequest para validar
        // $request->validate([
        //     'nro_oc' => 'required',
        //     'fecha_oc' => 'required',
        //     'cant_oc'=> 'required',
        //     'precio_oc'=> 'required',
        // ]);
        $Imputaciones = Imputacion::create($request->all());
        return redirect()->route('imputaciones.index');
    }

    public function show(Imputacion $Imputaciones)
    {
        return view('imputaciones.show', compact('Imputaciones'));
    }

    public function edit(Imputacion $Imputacion)
    {
        return view('imputaciones.edit', compact('Imputaciones'));
    }

    public function update(StoreImputacion $request, Imputacion $Imputacion)
    {
        // $request->validate(['nroOc' => 'required', 'fecOc' => 'required', 'cantOc' => 'required', 'preUnitOc' => 'required']);

        $Imputacion->update($request->all());
        return redirect()->route('imputaciones.index');
    }

    public function destroy(Imputacion $Imputacion)
    {
        $Imputacion->delete();
        return redirect()->route('imputaciones.index');
    }
}



