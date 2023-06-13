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
        $Facturas=Factura::where('imputado', '')->get();
        $Cheques=Cheque::where('imputado', 'N')->get();

        $headsF = [
            // 'Nro Fac',
            ['label' => 'Sel.', 'no-export' => true, 'width' => 3, 'class' => 'text-center'],
            'Fecha',
            'nroFac ',
            'Imp Fac',
            'Imputado'
        ];

        $configF = [
            'order' => [1, 'desc'],
            'columns' => [null, null, null, null, ['orderable' => false]]
        ];

        $headsC = [
            'Fecha',
            'Banco',
            'nro Chq ',
            ['label' =>'Imp Chq', 'width' => 1, 'class' => 'text-right'],
            ['label' => 'Sel.', 'no-export' => true, 'width' => 3, 'class' => 'text-center'],
        ];

        $configC = [
            'order' => [0, 'desc'],
            'columns' => [null, ['orderable' => false], null, null, null]
        ];

        // return view(var_dump($Facturas));
        return view('imputaciones.index', compact('Imputaciones', 'Facturas','headsF', 'configF', 'Cheques',  'headsC', 'configC'));
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



