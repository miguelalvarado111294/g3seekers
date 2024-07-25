<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\cliente;
use App\Models\cuenta;
use App\Models\vehiculo;
use App\Models\linea;
use App\Models\tiposervicio;
use App\Models\dispositivo;
use App\Models\order;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
   
        $datos['orders']=order::paginate(7);
        return view('order.index',$datos);
    }

    public function pdf()
    {
       /*
        $orders['orders']=Order::all();
        $pdf = Pdf::loadView('order.pdf',  compact('orders'));
        return $pdf->download('order.pdf');
   

$orders=Order::with('cliente')->get();
$pdf=Pdf::loadView('order.pdf',compact('orders'));
return $pdf->stream('orden.pdf');
  */
  $orders=Order::paginate();
  
  $clientes=cliente::paginate();
  $pdf = Pdf::loadView('order.pdf', [
    'orders'=>$orders,
    'clientes'=>$clientes
  
  ] );
  return $pdf->stream('order.pdf');


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //     
        $clientes=Cliente::all();
        $vehiculos=vehiculo::all();
        $lineas=linea::all();
        $tiposervicios=tiposervicio::all();
        $dispositivos=dispositivo::all();

        return view('order.create',compact('clientes','vehiculos','lineas','tiposervicios','dispositivos'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $campos= [ 
            'usuario'=>'required|alpha_dash|min:2|max:15',
            'contrasenia'=>'required|alpha_dash|min:2|max:15',
            'contraseniaParo'=>'required|alpha_dash|min:2|max:100'
           
           ];
        
       // $this->validate($request,$campos/*$mensaje*/);
        $datosOrder = request()->except('_token');
        order::insert($datosOrder);

      // return response()->json($datosOrder);
        return redirect ('order')->with('mensaje','cuenta agregado exitosamente ');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        //
        $clientes=Cliente::all();
        $vehiculos=vehiculo::all();
        $lineas=linea::all();
        $tiposervicios=tiposervicio::all();
        $dispositivos=dispositivo::all();

        $order=order::findOrfail($id);
        return view('order.edit', compact('order','clientes','vehiculos','lineas','tiposervicios','dispositivos'));
       // return view('referencia.edit',compact('clientes'));

    }

    
    public function update(Request $request, $id)
    {
        
        $campos= [ 
            'usuario'=>'required|alpha_dash|min:2|max:15',
            'contrasenia'=>'required|alpha_dash|min:2|max:15',
            'contraseniaParo'=>'required|alpha_dash|min:2|max:100'
           
           ];
        
         //$this->validate($request,$campos/*$mensaje*/);
     $datosOrder = request()->except(['_token', '_method']);
    
     order::where('id','=',$id)->update($datosOrder);
     $order=order::findOrFail($id);
       // return response()->json($datosReferencia);
        return redirect ('order')->with('mensaje','order editada exitosamente ');
     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {     
        order::destroy($id);
        return redirect ('order')->with('mensaje','cuenta eliminada exitosamente ');
    }
}
