<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLineaFac;
use Illuminate\Http\Request;
use App\Models\LineaFac;

class LineaFacController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      //
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(StoreLineaFac $request)
    public function store(StoreLineaFac $request)
    {

        $fecFac = request('fecFac');
        $cantFac = request('cantFac');
        $impFac = request('impFac');
        $remST = request('remST');
        $tipo = request('tipo');
        $nroFac = request('nroFac');
        $oc_id = request('oc_id');
        $remk_id = request('remk_id');

        // $LineaFac =  LineaFac::create(request()->only('fecFac', 'cantFac' ,  'impFac' , 'remST', 'tipo', 'nroFac', 'oc_id', 'remk_id'));
        $LineaFac = LineaFac::create($request->all());


        // var_dump($request);
        // return view(json($request));
        return redirect()->route('facturas.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
