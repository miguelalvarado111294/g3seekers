<?php

namespace App\Http\Controllers;


use App\Http\Controllers\ClienteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\prueba;
use App\Models\cliente;
use App\Models\ctaespejo;
use App\Models\ctaespejosecundaria;
use App\Models\cuenta;
use App\Models\dispositivo;
use App\Models\vehiculo;
use App\Models\referencia;
use App\Models\linea;
use App\Models\sensor;
use Illuminate\Validation\Rules\Exists;

class PruebaController extends Controller
{

public function buscarCuenta($id){

    $cuentas=Cuenta::where('cliente_id','LIKE', '%' . $id . '%')->get()->take(1);
    $clientes=Cliente::find($id);

    return view('prueba.buscarCuenta', compact('cuentas','clientes','id','id'));

     }


public function buscarVehiculo ($id){

    $cliente=   Cliente::findOrFail($id);
    $vehiculos= Vehiculo::where('cliente_id','LIKE','%' . $id . '%')->get();
    $dispositivo=Dispositivo::where('cliente_id','LIKE','%' . $id . '%')->first();
//    $dispositivo_id=$dispositivo->id;
    return view('prueba.vehiculo',compact('vehiculos','id'));

    }


    public function buscarDispositivo($id){

    $dispositivos=Dispositivo::where('cliente_id','LIKE','%' . $id . '%')->get();
    $linea=Linea::where('cliente_id','LIKE','%'.$id.'%')->take(1);

    return view ('prueba.buscarDispositivo',compact('dispositivos','id'));

    }

    public function buscarCtaespejo($id){

        $ctaespejos=ctaespejo::findOrFail($id)->where('cuenta_id','LIKE','%' . $id . '%')
        ->first();

        return view('prueba.buscarctaespejo', compact('ctaespejos'));

        }


     public function buscarLinea($id){


        $lineas=Linea::where('cliente_id' , 'LIKE' , '%' . $id . '%')->get()->take(1);

        return view ('prueba.buscarLinea',compact('lineas','id'));

     }


     public function buscarSensor($id){

        $sensors=Sensor::where('dispositivo_id' , 'LIKE' , '%' . $id . '%')->get();
/*
if(!empty($sensors)){
    return redirect()->route('sensorf.crear', $id);
}else
  */
    return view('prueba.buscarSensor',compact('sensors','id'));

     }


 }



        /*
       $vehiculos=DB::table('vehiculos')
        ->select('id','marca','modelo','placa','noserie','color','cliente_id')
        ->where('cliente_id','LIKE', '%' . $id . '%')->first();
        return view('prueba.vehiculo',compact('vehiculos' , 'id'));

        $vehiculos=vehiculo::select('id','marca','modelo','placa','noserie','color','cliente_id')
                    ->where('cliente_id','LIKE', '%' . $id . '%')->first();

        $vehiculos=vehiculo::select('id','marca','modelo','placa','noserie','color','cliente_id')
                    ->where('cliente_id','LIKE', '%' . $id . '%')->get();
       */
//dd($vehiculos);
