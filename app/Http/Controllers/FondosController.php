<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreImputacion;
use App\Http\Requests\StoreFactura;
use App\Http\Requests\StoreCheque;
use App\Models\Cheques;
use App\Models\Facturas;
use App\Models\Imputaciones;

class FondosController extends Controller {
    // $Facturas =  Facturas::table('facturas')->join('idNroFac', '=', 'id')->ordereBy('fecFac', 'desc')->get();
    // var_dump($Facturas);
    // // var_dump($Cheques);

    // return view('fondos.imputar', compact($Facturas ));
}
