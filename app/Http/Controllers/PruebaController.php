<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use App\Models\ctaespejo;
use App\Models\cuenta;
use App\Models\dispositivo;
use App\Models\vehiculo;
use App\Models\linea;
use App\Models\sensor;

class PruebaController extends Controller
{

    public function buscarCuenta($id){//recibe id desde show

    $cuentas=Cuenta::where('cliente_id','LIKE', '%' . $id . '%')->get()->take(1);
    $clientes=Cliente::find($id);

    return view('prueba.buscarCuenta', compact('cuentas','clientes','id'));

    }


    public function buscarVehiculo ($id){//recive id cliente desde buscar cta

    //obtener vehiculos relacionados con cliente id
    $vehiculos= Vehiculo::where('cliente_id','LIKE','%' . $id . '%')->get();

    return view('prueba.vehiculo',compact('vehiculos','id'));
                                                        //se envia a view vehiculo id de cliente

    }


    public function buscarDispositivo($id){//recibe desde view vehiculos id de cliente
    $dispositivos=Dispositivo::where('cliente_id','LIKE','%' . $id . '%')->get();

    return view ('prueba.buscarDispositivo',compact('dispositivos','id'));
    //return redirect ()->route('buscar.dispositivo', $id)->with('dispositivos');

    }


     public function buscarLinea($id){//recibe id cliente $dispositivo_id

    $dispositivo=Dispositivo::find($id);
    $lineas=Linea::where('cliente_id','LIKE','%' . $dispositivo->cliente_id . '%')->get();



    return view('prueba.buscarLinea',compact('lineas','dispositivo'));


    }

     public function buscarSensor($id){

    $sensors=Sensor::where('dispositivo_id' , 'LIKE' , '%' . $id . '%')->get();

    return view('prueba.buscarSensor',compact('sensors','id'));

     }

     public function buscarCtaespejo($id){

    //return $id;
    $ctaespejos=Ctaespejo::where('cuenta_id','LIKE','%' . $id . '%')->get();


    return view('prueba.buscarctaespejo', compact('ctaespejos','id'));

    }

 }
