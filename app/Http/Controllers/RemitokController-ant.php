<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRemitoK;
use App\Models\Ocompra;
use App\Models\Remitok;
use Illuminate\Http\Request;

class RemitokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Ocompras = Ocompra::all();
        return view('remitos.create', compact('Ocompras'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRemitoK $request)
    {
        $Remito = RemitoK::create($request->all());
        return redirect()->route('remitos.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(RemitoK $remitoK)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RemitoK $remitoK)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RemitoK $remitoK)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RemitoK $remitoK)
    {
        //
    }
}
