<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDeposito;
use Illuminate\Http\Request;
use App\Models\Depositos;
use App\Models\Cheques;

class DepositosController extends Controller
{
    public function index() {
        $Depositos = depositos::all();

        // $Depositos = depositos::orderBy('fecDpto', 'desc')
        // ->orderby('id', 'desc')
        // ->paginate();

        $heads = [
            'Nro',
            'Banco',
            'Fecha',
            'Importe',
            'Cuenta',
            'Acciones',
        ];

        return view('depositos.index', compact('Depositos', 'heads'));
    }
    public function create() {
        return view('depositos.create');
    }
    public function store(StoreDeposito $request){
        // validacion de datos si no usamos formRequest para validar
        // $request->validate([
        //     'nro_oc' => 'required',
        //     'fecha_oc' => 'required',
        //     'cant_oc'=> 'required',
        //     'precio_oc'=> 'required',
        // ]);
        // $Deposito = Depositos::create($request->all());
        $Cheque =  Cheques($request->all('depositado'));
        return redirect()->route('cheques.index');
    }

    public function show(Depositos $Deposito)
    {
        // $Ocompra =  ocompras::find($Ocompra);
        return view('depositos.show', compact('Deposito'));
    }

    public function edit(Depositos $Deposito)    {
        return view('depositos.edit', compact('Deposito'));
    }

    public function update(StoreDeposito $request, Depositos $Deposito)
    {
        // $request->validate(['nroChq' => 'required', 'fecChq' => 'required', 'impChq' =>'required', 'bancoChq' =>'required', 'fecDpto' =>'required', 'ctaDpstChq' => 'required']);

        $Deposito->update($request->all());
        // return redirect()->route('ocompras.show', $Ocompra);
        return redirect()->route('depositos.index');
    }

    public function destroy(Depositos $Deposito) {
        $Deposito->delete();
        return redirect()->route('depositos.index');
    }

    }
