<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImputacion;
use Illuminate\Http\Request;
use App\Models\Imputaciones;

class ImputacionesController extends Controller
{
    public function index()
    {
        $Imputaciones = imputaciones::all();
        // $Imputaciones = imputaciones::orderBy('fecImputacion', 'desc')->paginate();

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
        $Imputacion = imputaciones::create($request->all());
        return redirect()->route('imputaciones.index');
    }

    public function show(Imputaciones $Ocompra)
    {
        return view('imputaciones.show', compact('Ocompra'));
    }

    public function edit(Imputaciones $Imputacion)
    {
        return view('imputaciones.edit', compact('Imputacion'));
    }

    public function update(Request $request, Imputaciones $Imputacion)
    {
        $request->validate(['nroOc' => 'required', 'fecOc' => 'required', 'cantOc' => 'required', 'preUnitOc' => 'required']);

        $Imputacion->update($request->all());
        return redirect()->route('imputaciones.index');
    }

    public function destroy(imputaciones $Imputacion)
    {
        $Imputacion->delete();
        return redirect()->route('imputaciones.index');
    }
}



