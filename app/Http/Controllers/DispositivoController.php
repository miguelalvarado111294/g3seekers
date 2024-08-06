<?php

namespace App\Http\Controllers;

use App\Models\dispositivo;
use App\Models\cuenta;
use App\Models\vehiculo;
use App\Models\cliente;
use App\Models\linea;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class DispositivoController extends Controller
{


    public function index()
    {

        $datos['dispositivos']=dispositivo::paginate(7);
        return view('dispositivo.index',$datos);
    }

    public function create()
    {
        $vehiculos=vehiculo::all();
        $clientes=cliente::all();
        return view('dispositivo.create',compact('vehiculos','clientes'));

    }

    public function store(Request $request)
    {

        $campos= [
            'modelo'=>'required|alpha_dash|min:2|max:100',
            'noserie'=>'required|alpha_dash|min:20',
            'imei'=>'required|numeric|min:2|min:18'
           ];

        $this->validate($request,$campos/*$mensaje*/);
        $datosDispositivo = $request->except('_token');
        Dispositivo::insert($datosDispositivo);

        return redirect ('dispositivo')->with('mensaje','Dispositivo agregado exitosamente ');

    }

    public function creardisp($id)
    {

    return view('dispositivo.createid', ['id'=>$id] );

    }

    public function stodis(Request $request ,$id){

    $vehiculoid=$id;
    $vehiculo=Vehiculo::find($vehiculoid);
    $clienteid=$vehiculo->cliente_id;

    $request->validate([
        'modelo'=>'required|alpha_dash|min:2|max:100',
        'noserie'=>'required|alpha_dash|min:20',
        'imei'=>'required|numeric|min:2|min:18'
    ]);

/*
        $dispositivo=Dispositivo::create([
        'modelo'=>$request->modelo,
        'noserie'=>$request->noserie,
        'imei'=>$request->imei,
        'comentarios'=>$request->comentarios,
        'cliente_id'=>$clienteid,
        'vehiculo_id'=>$vehiculoid
        
        ]);

        return $dispositivo;
*/

    $dispositivo= new Dispositivo();
    $dispositivo->modelo=$request->modelo;
    $dispositivo->noserie=$request->noserie;
    $dispositivo->imei=$request->imei;
    $dispositivo->comentarios=$request->comentarios;
    $dispositivo->vehiculo_id=$vehiculoid;
    $dispositivo->cliente_id=$clienteid;
    $dispositivo->save();

    return redirect()->route('buscar.dispositivo', $vehiculoid=$id);

 }
    public function show(dispositivo $dispositivo)
    {

    }


    public function edit( $id)
    {

        $vehiculos=vehiculo::all();
        $clientes=cliente::all();
        $dispositivo=dispositivo::findOrfail($id);
        return view('dispositivo.edit', compact('dispositivo','clientes','vehiculos'));


    }


    public function update(Request $request, $id)
    {

        $campos= [
            'modelo'=>'required|alpha_dash|min:2|max:100',
            'noserie'=>'required|alpha_dash|min:20',
            'imei'=>'required|numeric|min:2|min:18'
           ];

     $this->validate($request,$campos/*$mensaje*/);
     $datosDispositivo = $request->except(['_token', '_method']);

     Dispositivo::where('id','=',$id)->update($datosDispositivo);
     $dispositivo=Dispositivo::findOrFail($id);

     return redirect()->route('buscar.dispositivo',$dispositivo->vehiculo_id);


    }

   public function destroy($id)
    {
        Dispositivo::destroy($id);
        $dispositivos=Dispositivo::where('cliente_id','LIKE','%' . $id . '%')->get();
        return redirect()->back();

    }
}
