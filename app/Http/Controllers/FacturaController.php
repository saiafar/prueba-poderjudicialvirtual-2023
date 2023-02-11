<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Factura;
use Illuminate\Http\Request;
use stdClass;

class FacturaController extends Controller
{


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $factura  = Factura::find($request->id);
        $compras = Compra::where('factura_id', $request->id)->with('producto')->orderBy('producto_id')->get();

        $detalles = [];
        $std = New stdClass();
        $std->cantidad = 0;
        $std->subtotal = 0;
        foreach($compras as $key=>$compra){
            if($key > 0){
                if($compras[$key-1]->producto_id != $compra->producto_id){
                    $detalles[] = $std;
                    $std = New stdClass();
                    $std->cantidad = 0;
                    $std->subtotal = 0;
                }

            }

            $std->nombreProducto = $compra->producto->nombre;

            $std->cantidad++;
            $std->precio = $compra->producto->precio;
            $std->impuesto = $compra->producto->impuesto;
            $std->subtotal += $compra->producto->precio;
        }

        $detalles[] = $std;

        return view('factura', ['factura'=>$factura, 'detalles' => $detalles]);
    }

}
