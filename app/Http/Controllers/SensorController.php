<?php

namespace App\Http\Controllers;

use App\Models\dispositivo;
use App\Models\sensor;

use Illuminate\Http\Request;

class SensorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $datos['sensors']=sensor::paginate(5);
        return view('sensor.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $dispositivos=dispositivo::all();
        return view('sensor.create',compact('dispositivos'));

    }

public function crearsens ($id){

return view('sensor.createid',['id'=>$id]);
}

public function stosens (Request $request,$id){

    $sensor = new Sensor;

    $sensor->marca=$request->marca;
    $sensor->modelo=$request->modelo;
    $sensor->noserie=$request->noserie;
    $sensor->tipo=$request->tipo;
    $sensor->comentarios=$request->comentarios;
    $sensor->dispositivo_id=$id;

    $sensor->save();



    return redirect()->route('buscar.sensor',$id);




}



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $campos= [
            'marca'=>'required|alpha|min:2|max:100',
            'modelo'=> 'required|nullable|alpha_dash',
            'noserie'=>'required|alpha_dash|min:2|max:100',
            'tipo'=>'required|alpha|min:2|max:100'

           ];

        $this->validate($request,$campos/*$mensaje*/);
        $datosSensor = request()->except('_token');
        sensor::insert($datosSensor);

        return redirect ('sensor')->with('mensaje','sensor agregado exitosamente ');

    }

    /**
     * Display the specified resource.
     */
    public function show(sensor $sensor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        //
        $dispositivos=dispositivo::all();
        $sensors=sensor::findOrfail($id);
        return view('sensor.edit', compact('sensors','dispositivos'));

    }


    public function update(Request $request, $id)
    {

        $campos= [
            'marca'=>'required|alpha|min:2|max:100',
            'modelo'=> 'required|nullable|alpha_dash',
            'noserie'=>'required|alpha_dash|min:2|max:100',
            'tipo'=>'required|alpha|min:2|max:100'

           ];

     $this->validate($request,$campos/*$mensaje*/);
     $datosSensor = request()->except(['_token', '_method']);

     sensor::where('id','=',$id)->update($datosSensor);
     $sensor=sensor::findOrFail($id);
        return redirect ('sensor')->with('mensaje','sensor editado exitosamente ');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        sensor::destroy($id);
        return redirect()->route('buscar.sensor',$id);
    }
}
