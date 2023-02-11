<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Factura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $compra = new Compra();
        $compra->producto_id = $request->producto_id;
        $compra->user_id = $request->user()->id;
        $compra->cantidad = 1;
        $compra->save();

        return Redirect::to('dashboard')->with('mensaje', 'Ha comprado 1 producto');
    }

    public function facturar(){
        $compras = Compra::whereNull('factura_id')->with('producto')->orderBy('user_id')->get();
        $facturasGeneradas = [];

        $userCurrent = -1;

        $comprasPorCliente = [];
        $lote = [];
        $test = [];
        foreach($compras as $key=>$compra){
            if($key > 0){
                if($compras[$key-1]->user_id != $compra->user_id){
                    $comprasPorCliente[] = $lote;
                    $lote = [];
                }
            }
            $lote[] = $compra;
        }
        $comprasPorCliente[] = $lote;

        foreach($comprasPorCliente as $cxp){
            $factura = new Factura();
            $factura->base = 0;
            $factura->impuesto = 0;
            $factura->neto = 0;
            $factura->user_id = $cxp[0]->user_id;
            $factura->save();
            foreach($cxp as $compra){
                $base = ($compra->producto->precio / (100 + $compra->producto->impuesto) ) * 100;
                $iva = $compra->producto->precio - $base;

                $factura->base += $base;
                $factura->impuesto += $iva;
                $factura->neto += $compra->producto->precio;
                $compra->factura_id = $factura->id;
                $compra->save();
            }

            $factura->save();
            $facturasGeneradas[] = $factura->id;


        }

        //return response()->json($comprasPorCliente);
/*
            $base = ($compra->producto->precio / (100 + $compra->producto->impuesto) ) * 100;
            $iva = $compra->producto->precio - $base;

            $factura = new Factura();
            $factura->base = $base;
            $factura->impuesto = $iva;
            $factura->neto = $compra->producto->precio;
            $factura->save();
            $compra->factura_id = $factura->id;
            $compra->save();
            $facturasGeneradas[] = $compra->id;
        }*/

        return redirect()->route('dashboard', ['generadas' => $facturasGeneradas]);
    }
}
