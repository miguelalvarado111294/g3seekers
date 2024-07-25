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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $datos['dispositivos']=dispositivo::paginate(7);
        return view('dispositivo.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vehiculos=vehiculo::all();
        $clientes=cliente::all();
        return view('dispositivo.create',compact('vehiculos','clientes'));

    }
    public function creardispositivo($id)
    {

        return view('dispositivo.crear');

    }

    /**
     * Store a newly created resource in storage.
     */
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

       // return response()->json($datosReferencia);
        return redirect ('dispositivo')->with('mensaje','Dispositivo agregado exitosamente ');

    }

    public function creardisp($id)
    {


        return view('dispositivo.createid', ['id'=>$id] );

    }

    public function stodis(Request $request ,$id){

        $linea=Linea::where('cliente_id','LIKE', '%' . $id . '%')->first();
//        $lineaid=$linea->id;
       // return $linea;
    $dispositivo= new Dispositivo();

    $dispositivo->modelo=$request->modelo;
    $dispositivo->noserie=$request->noserie;
    $dispositivo->imei=$request->imei;
    $dispositivo->comentarios=$request->comentarios;
    $dispositivo->cliente_id=$id;

  //  $dispositivo->sensor_id=$request->color;
  //  $dispositivo->linea_id=$lineaid;

    $dispositivo->save();


return redirect()->route('buscar.dispositivo',$id);


 }
    public function show(dispositivo $dispositivo)
    {
        //
    }


    public function edit( $id)
    {
        //
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

       // return response()->json($datosReferencia);
       // return redirect ('dispositivo')->with('mensaje','Registro editado exitosamente ');
       return redirect()->route('buscar.dispositivo',$dispositivo->cliente_id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        dispositivo::destroy($id);
        //return redirect ('dispositivo')->with('mensaje','dispositivo eliminada exitosamente ');
        $cliente=Cliente::findOrFail($id);

        return redirect()->route('buscar.dispositivo',$cliente->id);

    }
}
