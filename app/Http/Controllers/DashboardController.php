<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Factura;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        if($user->tipo == User::ADMIN){
            return $this->dashboardAdmin($request);
        }
        return $this->dashboardClient();
    }

    public function dashboardClient(){
        $productos = Producto::all();
        return view('dashboard', ['productos'=>$productos]);
    }

    public function dashboardAdmin(Request $request){

        $facturasGeneradas = [];
        if($request->generadas){
            $facturasGeneradas = Factura::WhereIn('id', $request->generadas)->get();
        }
        return view('dashboardAdmin', ['facturas' => $facturasGeneradas]);
    }
}
