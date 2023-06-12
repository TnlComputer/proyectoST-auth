<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Ocompra;
use App\Models\Remitok;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFactura;

class FacturaController extends Controller
{
    public function index()
    {
        // $Facturas =  facturas::orderBy('fecFac', 'desc')
        // ->orderby('id', 'desc')
        // ->paginate();

        $Facturas =  Factura::all();

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
            'columns' => [null, null, null, null, null, null, null, ['orderable' => false], ['orderable' => false]],
        ];

        return view('facturas.index', compact('Facturas', 'heads', 'config'));
    }

    public function create()
    {
        $Ocompras =  Ocompra::all();
        $Remitos = remitok::all();
        return view('facturas.create', compact('Ocompras', 'Remitos'));
    }

    public function store(StoreFactura $request)
    {
        $Factura =  Factura::create($request->all());
        return redirect()->route('facturas.index');
    }

    public function show(Factura $Factura)
    {
        return view('facturas.show', compact('Factura'));
    }
    public function edit(Factura $Factura)
    {
        $Ocompras =  Ocompra::all();
        $Remitos = remitok::all();

        return view('facturas.edit', compact('Factura', 'Ocompras', 'Remitos'));
    }

    public function update(StoreFactura $request, Factura $Factura)
    {
        // $request->validate([
        //     'nroFac' => 'required',
        //     'fecFac' => 'required',
        //     'cantFac' => 'required',
        //     'impFac' => 'required',
        // ]);

        $Factura->update($request->all());
        return redirect()->route('facturas.index');
    }

    public function destroy(Factura $Factura)
    {
        $Factura->delete();
        return redirect()->route('facturas.index');
    }
}
