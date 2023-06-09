<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRemitok;
use App\Models\Ocompra;
use App\Models\Remitok;
use Illuminate\Http\Request;

class RemitokController extends Controller
{
    public function index()
    {
        $Remitos = Remitok::all();
        // ->orderBy('fecRemK', 'ASC')
        // ->get();
        // $Remitos = Remitosk::orderBy('fecRemK')->all();
        // $Remitos = Remitosk::all()->orderBy('fecRemK', 'desc');
        // ->orderby('id', 'desc')
        // ->paginate();

        $heads = [
            // ['label' => 'Fecha', 'order' => [2,'desc']],
            ['label' => 'Fecha', 'width' => 12, 'class' => 'text-center'],
            'Remito K',
            'Cantidad',
            'Usado',
            'O.Compra K',
            // ['label' => 'Acciones', 'width' => 40],
            ['label' => 'Acciones', 'no-export' => true, 'width' => 6, 'class' => 'text-center'],
        ];

        $config = [
            'order' => [[0, 'desc']],
            'columns' => [null, null,  ['orderable' => false],  ['orderable' => false], null, ['orderable' => false]],
        ];

        return view('remitos.index', compact('Remitos', 'heads', 'config'));
    }
    public function create()
    {
        $Ocompras = Ocompra::all();
        return view('remitos.create', compact('Ocompras'));
    }
    public function store(StoreRemitok $request)
    {
        $Remito = Remitok::create($request->all());
        return redirect()->route('remitos.index');
    }
    public function show(RemitoK $Remito)
    {
        return view('remitos.show', compact('Remito'));
    }

    public function edit(Remitok $Remito)
    {
        $Ocompras = Ocompra::all();
        return view('remitos.edit', compact('Remito', 'Ocompras'));
    }

    public function update(Request $request, Remitok $Remito)
    {
        $request->validate(['nroRemK' => 'required', 'fecRemK' => 'required', 'cantRemK' => 'required']);

        $Remito->update($request->all());
        return redirect()->route('remitos.index');
    }

    public function destroy(remitok $Remito)
    {
        $Remito->delete();
        return redirect()->route('remitos.index');
    }
}


