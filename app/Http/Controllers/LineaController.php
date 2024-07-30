<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\linea;
use App\Models\dispositivo;
use App\Models\cliente;


class LineaController extends Controller
{


    public function index()
    {
        $datos['lineas']=Linea::paginate(7);
        return view('linea.index',$datos);
    }

    public function create()
    {

        $clientes=cliente::all();
        $dispositivos=dispositivo::all();

        return view('linea.create',compact('clientes','dispositivos'));


    }

    public function store(Request $request)
    {
        $campos= [
            'simcard'=>'required|numeric|digits:18',
            'telefono'=>'required|numeric|digits:10',
            'tipolinea'=>'required|alpha|min:2|max:5',
            'renovacion'=>'required|alpha'

           ];
        $this->validate($request,$campos/*$mensaje*/);


        $datosLinea= $request->except('_token');
        Linea::insert($datosLinea);
        return redirect ('linea')->with('mensaje','linea agregado exitosamente ');
    }


    public function crearlinea($id)
    {

        //return $id;
        return view('linea.createid', ['id'=>$id] );

    }

    public function storep(Request $request, $dispositivoid)
    {
       /* $campos= [
            'simcard'=>'required|numeric|digits:18',
            'telefono'=>'required|numeric|digits:10',
            'tipolinea'=>'required|alpha|min:2|max:5',
            'renovacion'=>'required|alpha'

           ];
        $this->validate($request,$campos,$mensaje);
       $datosLinea= request()->except('_token');

        */

$dispositivo=Dispositivo::find($dispositivoid);

$linea= new Linea;
$linea->simcard=$request->simcard;
$linea->telefono=$request->telefono;
$linea->tipolinea=$request->tipolinea;
$linea->renovacion=$request->renovacion;
$linea->comentarios=$request->comentarios;
$linea->dispositivo_id=$dispositivoid;
$linea->cliente_id=$dispositivo->cliente_id;

//return $linea;
$linea->save();

return redirect()->route('buscar.linea',$dispositivoid);

//return redirect


//        return redirect ('linea')->with('mensaje','linea agregado exitosamente ');
    }





    public function show(linea $cliente)
    {
        //
    }


    public function edit($id)
    {
        //
        $clientes=cliente::all();
        $dispositivos=dispositivo::all();
        $linea=Linea::findOrfail($id);
        return view('linea.edit', compact('linea','clientes','dispositivos'));

    }


    public function update(Request $request, $id)//recive id de la linea
    {

        $campos= [
            'simcard'=>'required|numeric|digits:18',
            'telefono'=>'required|numeric|digits:10',
            'tipolinea'=>'required|alpha|min:2|max:5',
            'renovacion'=>'required|alpha'
           ];

        $this->validate($request,$campos/*$mensaje*/);
        $datosLinea = $request->except(['_token', '_method']);
        Linea::where('id','=',$id)->update($datosLinea);

        //$linea=Linea::where('linea_id','LIKE','%' . $id . '%')->get();
        $linea=Linea::find($id);

       // return $linea->dispositivo_id;

        return redirect()->route('buscar.linea',$linea->dispositivo_id);


    }

    public function destroy($id)
    {
        Linea::destroy($id);
        return redirect()->back();

}
 }
