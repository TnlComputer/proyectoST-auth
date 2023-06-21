<?php

namespace App\Http\Controllers;

// use App\Http\Requests\StoreImputacion;
use Illuminate\Http\Request;
use App\Models\Cheque;
use App\Models\Factura;
use App\Models\Imputacion;

class ImputacionController extends Controller
{
    public function index()
    {
        $Imputaciones = Imputacion::all();
        $Facturas=Factura::where('imputado', NULL)->get();
        $Cheques=Cheque::where('cobrado', 'SI')->where('imputado', NULL)->orderBy('fecChq', 'asc')->get();

        $headsF = [
            // 'Nro Fac',
            'Fecha',
            'nroFac ',
            'Imp Fac',
            'Imputado',
            ['label' => 'Cheque', 'width' => 25, 'class' => 'text-right'],
            ['label' => 'Importe', 'width' => 14, 'class' => 'text-right'],
            ['label' => 'Accion.', 'no-export' => true, 'width' => 3, 'class' => 'text-center'],
        ];

        $configF = [
            'order' => [0, 'desc'],
            'columns' => [null, null,['orderable' => false], ['orderable' => false], ['orderable' => false], ['orderable' => false],['orderable' => false]]
        ];

        // $headsC = [
        //     'Fecha',
        //     'Banco',
        //     'nro Chq ',
        //     ['label' =>'Importe', 'width' => 1, 'class' => 'text-right'],
        //     ['label' => 'Sel.', 'no-export' => true, 'width' => 3, 'class' => 'text-center'],
        // ];

        // $configC = [
        //     'order' => [0, 'desc'],
        //     'columns' => [null, null, null, ['orderable' => false], ['orderable' => false]]
        // ];

        // return view(var_dump($Facturas));
        // return view('imputaciones.index', compact('Imputaciones', 'Facturas', 'headsF', 'configF', 'Cheques',  'headsC', 'configC'));
        return view('imputaciones.index', compact('Imputaciones', 'Facturas', 'headsF', 'configF', 'Cheques'));
    }

    public function store(Request $request)
    {
        // validacion de datos si no usamos formRequest para validar
        // $request->validate([
        //     'nro_oc' => 'required',
        //     'fecha_oc' => 'required',
        //     'cant_oc'=> 'required',
        //     'precio_oc'=> 'required',
        // ]);
        //     $fecFac = request('fecFac');
        //     $fac_id = request('fac_id');
        //     $fac_imp = request('impFac');
        //     $pagado = request('pagado');
        //     $chq_id = request('chq_id');
        //     $impChq = request('impChq');
        //     $impChqImp = request('impImp');

        // Imputacion::created( request()->only('impChqImp', 'fac_id', 'chq_id', 'impChq', 'impFac'));

        // $Imputaciones = Imputacion::create($request->all());
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

    public function update(Request $request, Factura $Factura)
    {

        // if  (request('id') > 0 )
        // {
            $fecFac = request('fecFac');
            $fac_id = request('fac_id');
            $impFac = request('impFac');
            $pagado = request('pagado');
            $chq_id = request('chq_id');
            $impChq = request('impChq');
            $impChqImp = request('impChqImp');

            if (request('impChq' < request('pagado'))){
                $notificacion = 'El importe no puede ser mayor que el importe restante de la Factura';
            }

            if (request('pagado') === NULL) {
            // Imputacion::created(request()->only('impChqImp', 'fac_id', 'chq_id', 'impChq', 'impFac'));
            Imputacion::create($request->all());
            }
            $FacturaUpd = Factura::find(request('fac_id'));
            $pagadoNew = $FacturaUpd->pagado + request('impChqImp');
            if ($FacturaUpd->impFac === $pagadoNew)
            {
                $imputado='I';
            }else{
                $imputado = NULL;
            }

            Factura::where('id', request('fac_id'))->update(  ['pagado' =>  $pagadoNew, 'imputado' => $imputado]);

            $ChequeUpd = Cheque::find(request('chq_id'));
            $impSaldo = request('impChqImp') + $ChequeUpd->impSaldo;

        if ($FacturaUpd->impChq === $impSaldo) {
            $imputado = 'I';
        } else {
            $imputado = NULL;
        }

            Cheque::where('id', request('chq_id'))->update([ 'imputado' => $imputado, 'impSaldo' => $impSaldo
        ]);
    // }

            // no hago nada por ahora

        // return ($factura);
        // echo $request;
        // var_dump($Cheque);
        // var_dump($Imputacion);
        // $Imputacion->update($request->all());
        return redirect()->route('imputaciones.index', );
        // return redirect()->route('imputaciones.index', compact($notificacion));
    }

    public function destroy(Imputacion $Imputacion)
    {
        $Imputacion->delete();
        return redirect()->route('imputaciones.index');
    }
}



