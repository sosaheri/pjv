<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Compra;
use App\Models\User;

use Illuminate\Http\Request;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $facts = Factura::all();
        return view('factura/index', compact('facts') )->with('message', '');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Factura  $product
     * @return \Illuminate\Http\Response
     */
    public function show($factura)
    {
        
        $factura = Factura::where('id', $factura)->first();


        // dd(json_decode($factura->detallado,true)[0][1][0]);

        return view('factura/show', compact('factura') )->with('message', '');
    }    

    public function facturar()
    {
        
        $compras_pendientes = Compra::where('facturado', false)->get();

        if( count($compras_pendientes) > 0){

            $agrupadas = $compras_pendientes->groupBy('user_id')->all();
      
            foreach ($agrupadas as $user => $compras) {

            $facts = Factura::all();
            return view('factura/index', compact('facts') )->with('message', 'Se generaron las facturas pendientes');

            }

        }

        
        $facts = Factura::all();
        return view('factura/index', compact('facts') )->with('message', 'No hay compras por facturar');
    }


    public function createFactura( $user, $compras )
    {
        $factura = new Factura;
        $total_precio = $total_impuesto = 0;
        $detallado = [];
        $marcar = [];

            $facturar = $compras->all();

            for ($i=0; $i < count($facturar); $i++) { 
                $total_precio += $facturar[$i]->product->precio;
                $total_impuesto += $facturar[$i]->product->impuesto;
                array_push($detallado, [ $facturar[$i]->product->nombre, $facturar[$i]->product->precio,$facturar[$i]->product->impuesto ] );
                array_push($marcar, $facturar[$i]->id );

            }

            $factura->user_id = $user;
            $factura->total_factura = $total_precio;
            $factura->total_impuesto = $total_impuesto;
            $factura->detallado = json_encode($detallado, true);
            $factura->save();

            $this->procesarCompra($marcar);
            

            return $factura->id;

    }


    public function procesarCompra($marcar)
    {
        for ($i=0; $i < count($marcar) ; $i++) {
            
            $compra = Compra::where('id' , $marcar[$i])->first();
            $compra->facturado =true;
            $compra->save();
        }
    }


}
