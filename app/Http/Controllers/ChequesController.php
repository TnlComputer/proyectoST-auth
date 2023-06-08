<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCheque;
use Illuminate\Http\Request;
use App\Models\Cheques;
// use App\Models\Depositos;


class ChequesController extends Controller
{
    public function index()
    {

        $Cheques =  Cheques::all();
        // $Cheques =  Cheques::orderBy('fecChq', 'desc')
        // ->orderby('id', 'desc')
        // ->paginate();

        $heads = [
            ['label' => 'Banco', 'width' => 20],
            ['label' => 'Nro.Serie', 'width' => 10],
            ['label' => 'Fecha', 'width' => 10],
            ['label' => 'Importe', 'width' => 10],
            ['label' => 'Cobrado', 'width' => 4],
            ['label' => 'Gastos', 'width' => 6],
            ['label' => 'Observaciones', 'width' => 20],
            ['label' => 'Acciones', 'no-export' => true],
        ];

        $config = [
            'order' => ['2', 'desc'],
            'columns' => [null, null, null, null, null, null, ['orderable' => false], ['orderable' => false]],
        ];


        return view('cheques.index', compact('Cheques', 'heads', 'config'));
    }

    public function create() {
        return view('cheques.create');
    }
    public function store(StoreCheque $request) {
        $Cheque = cheques::create($request->all());
        return redirect()->route('cheques.index');
    }
    public function show(Cheques $Cheque)
    {
        return view('cheques.show', compact('Cheque'));
    }

    public function edit(Cheques $Cheque)
    {
        return view('cheques.edit', compact('Cheque'));
    }

    public function update(StoreCheque $request, Cheques $Cheque)
    {
        $Cheque->update($request->all());
        return redirect()->route('cheques.index');
    }

    public function destroy(Cheques $Cheque)
    {
        $Cheque->delete();
        return redirect()->route('cheques.index');
    }

}
