<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOcompra;
use Illuminate\Http\Request;
use App\Models\Ocompras;

class OcomprasController extends Controller
{
    public function index() {
        $Ocompras = ocompras::all();
        // $Ocompras = ocompras::orderBy('fecOc', 'desc')
        // ->orderby('id', 'desc')
        // ->paginate();

        $heads = [
            ['label' => 'Fecha', 'width' => 12, 'class' => 'text-center'],
            ['label' => 'O.compra', 'width' => 11, 'class' => 'text-center'],
            ['label' => 'Cantidad',  'width' => 12, 'class' => 'text-center'],
            ['label' => 'Cant Usada',  'width' => 15, 'class' => 'text-center'],
            'Precio',
            // ['label' => '$ Unidad',  'width' => 15, 'class' => 'text-center'],
            ['label' => 'Acciones', 'no-export' => true, 'width' => 6, 'class' => 'text-center'],
        ];

        $config = [
            'order' => [[0, 'desc'], [1, 'desc']],
            'columns' => [null, null, null, null,['orderable' => false], ['orderable' => false]],
        ];

        return view('ocompras.index', compact('Ocompras', 'heads', 'config'));
    }
    public function create() {
        return view('ocompras.create');
    }
    public function store(StoreOcompra $request){
        // validacion de datos si no usamos formRequest para validar
        // $request->validate([
        //     'nro_oc' => 'required',
        //     'fecha_oc' => 'required',
        //     'cant_oc'=> 'required',
        //     'precio_oc'=> 'required',
        // ]);
        $Ocompra = ocompras::create($request->all());
        return redirect()->route('ocompras.index');
    }

    public function show(Ocompras $Ocompra)
    {
        return view('ocompras.show', compact('Ocompra'));
    }

    public function edit(Ocompras $Ocompra)    {
        return view('ocompras.edit', compact('Ocompra'));
    }

    public function update(StoreOcompra $request, Ocompras $Ocompra)
    {
        // $request->validate(['nroOc' => 'required', 'fecOc' => 'required', 'cantOc' => 'required', 'preUnitOc' => 'required']);

        $Ocompra->update($request->all());
        return redirect()->route('ocompras.index');
    }

    public function destroy(ocompras $Ocompra) {
        $Ocompra->delete();
        return redirect()->route('ocompras.index');
    }
    }
