<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreImputacion;
use App\Http\Requests\StoreCheque;
use Illuminate\Http\Request;
use App\Models\cheque;
use App\Models\Imputacion;
use App\Models\Fondo;

class FondosController extends Controller
{
    public function index()
    {
        $Imputaciones = Imputacion::all();

        $heads = [
            'Nro Fac',
            'Fecha Fac',
            'Imp Fac',
            // 'NC',
            // 'Fecha NC',
            'Fecha Chq',
            'Banco',
            'Nro Cheque',
            'Imp Cheque',
            'Imp Imputado',
            'Accion',
            'Accion',
        ];

        $config = [
            'order' => [[1, 'desc']],
            'columns' => [null, null, null, null, null, null, null, null, ['orderable' => false], ['orderable' => false]],
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



