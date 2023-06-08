<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFactura;
use Illuminate\Http\Request;
use App\Models\Ocompras;
use App\Models\RemitosK;
use App\Models\Facturas;

class FacturasController extends Controller
{
    public function index()  {
        // $Facturas =  facturas::orderBy('fecFac', 'desc')
        // ->orderby('id', 'desc')
        // ->paginate();

        $Facturas =  facturas::all();

        $heads = [
            'Fecha',
            'Nro.Fac',
            'Cantidad',
            'Importe',
            'Remito ST',
            'O.Compra',
            'Remito K',
            ['label' => 'Estado', 'width' => 2],
            // 'Estado',
            // 'Cobrada',
            ['label' => 'Acciones', 'no-export' => true, 'width' => 4, 'align' => 'center'],
        ];

        $config = [
            'order' => [[0, 'desc'], [1, 'desc']],
            'columns' => [null, null, null, null, null, null, null,['orderable' => false], ['orderable' => false]],
        ];

        return view('facturas.index', compact('Facturas', 'heads', 'config'));
    }

    public function create() {
        $Ocompras =  ocompras::all();
        $Remitos = remitosk::all();
        return view('facturas.create', compact('Ocompras', 'Remitos'));
    }

    public function store(StoreFactura $request) {
    $Factura =  facturas::create($request->all());
    return redirect()->route('facturas.index');
    }

    public function show(Facturas $Factura)    {
        return view('facturas.show', compact('Factura'));
    }
    public function edit(Facturas $Factura)    {
        $Ocompras =  ocompras::all();
        $Remitos = remitosk::all();

        return view('facturas.edit', compact('Factura','Ocompras', 'Remitos'));
    }

    public function update(StoreFactura $request, Facturas $Factura) {
        // $request->validate([
        //     'nroFac' => 'required',
        //     'fecFac' => 'required',
        //     'cantFac' => 'required',
        //     'impFac' => 'required',
        // ]);

        $Factura->update($request->all());
        return redirect()->route('facturas.index');
    }

    public function destroy(facturas $Factura) {
        $Factura->delete();
        return redirect()->route('facturas.index');
    }
}
