<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vehiculo;
use App\Models\cliente;
use App\Models\tipovehiculo;
use App\Models\cuenta;
use App\Models\dispositivo;

class VehiculoController extends Controller
{

    public function index()
    {
        $datos['vehiculos']=Vehiculo::paginate(7);
        return view('vehiculo.index',$datos);
    }

    public function create()
    {
        $clientes=Cliente::all();
        $dispositivo=dispositivo::all();
        $cuentas=cuenta::all();
        return view('vehiculo.create',compact('clientes','tipounidad','cuentas','dispositivo'));
    }


    public function crearvehi($id)
    {
        $cuentas=cuenta::all();
        return view('vehiculo.createid',compact('id','cuentas'));
    }

    public function stovehi(Request $request ,$id){

    $vehiculo= new vehiculo();
    $vehiculo->marca=$request->marca;
    $vehiculo->modelo=$request->modelo;
    $vehiculo->noserie=$request->noserie;
    $vehiculo->placa=$request->placa;
    $vehiculo->color=$request->color;
    $vehiculo->comentarios=$request->comentarios;
    $vehiculo->tipo=$request->tipo;

    $vehiculo->cliente_id=$id;

    $vehiculo->save();

    return redirect()->route('buscar.vehiculo',$id);
}

    public function store(Request $request)
    {

        $campos= [
            'marca'=>'required|alpha_dash|min:2|max:100',
            'modelo'=> 'alpha_num',
            'noserie'=>'required|alpha_dash|min:18',
            'placa'=>'required|alpha_dash|min:8',
            'color'=>'required|string|max:10'
        ];

        $this->validate($request,$campos/*$mensaje*/);
        $datosVehiculo = $request->except('_token');
        Vehiculo::insert($datosVehiculo);
        return redirect ('vehiculo')->with('mensaje','vehiculo agregado exitosamente ');

    }

     public function edit($id)
    {

        $clientes=Cliente::all();
        $vehiculo=Vehiculo::findOrfail($id);
        return view('vehiculo.edit', compact('vehiculo'));

    }

    public function update(Request $request,$id)
    {

        $campos= [
            'marca'=>'required|alpha_dash|min:2|max:100',
            'modelo'=> 'alpha_num',
            'noserie'=>'required|alpha_dash|min:18',
            'placa'=>'required|alpha_dash|min:8',
           'color'=>'required|string|max:10'

           ];

    $this->validate($request,$campos/*$mensaje*/);
    $datosVehiculo = $request->except(['_token', '_method']);
    Vehiculo::where('id','=',$id)->update($datosVehiculo);
    $vehiculo=Vehiculo::findOrFail($id);
    return redirect()->route('buscar.vehiculo', $vehiculo->cliente_id);
    }

     public function destroy($id)
    {
        $vehiculo=Vehiculo::findOrFail($id);
        Vehiculo::destroy($id);
        return redirect()->route('buscar.vehiculo', $vehiculo->cliente_id);

    }
}
