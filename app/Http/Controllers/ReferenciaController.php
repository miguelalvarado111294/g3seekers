<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use GuzzleHttp\Referenci;
use Illuminate\Support\Facades\Storage;
use Validator;
use Illuminate\Support\Facades\Route;


use App\Models\referencia;
use App\Models\cliente;


class ReferenciaController extends Controller
{
    public function index()
    {

        $datos['referencias']=Referencia::paginate(5);
        return view('referencia.index',$datos);
    }
public function create(Request $request)
    {
        $clientes=Cliente::all();

        return view('referencia.create',compact('clientes'));

    }

public function crearref($id)
{
//    echo $id;
    $cliente=cliente::all();
    return view('referencia.createid',compact('id'));

}

public function storef(Request $request ,$id){

$referencia= new referencia();

$referencia->nombre=$request->nombre;
$referencia->segnombre=$request->segnombre;
$referencia->apellidopat=$request->apellidopat;
$referencia->apellidomat=$request->apellidomat;
$referencia->parentesco=$request->parentesco;
$referencia->telefono=$request->telefono;
$referencia->cliente_id=$id;
$referencia->save();
return redirect()->route('cliente.show',$id);


//return "its ok";
//return redirect()->back();






}









/*
    public function createdesderef(Request $request)
    {
        //
        $clientes=Cliente::all();

        return view('referencia.create',compact('clientes'));

    }
*/





    public function store(Request $request)
    {
        //
        $campos= [
            'nombre'=>'required|alpha|min:2|max:100',
            'segnombre'=> 'nullable|alpha',
            'apellidopat'=>'required|alpha|min:2|max:100',
            'apellidomat'=>'required|alpha|min:2|max:100',
            'telefono'=>'required|numeric|digits:10',
            'parentesco'=>'required'

           ];

        $this->validate($request,$campos/*$mensaje*/);
        $datosReferencia = $request->except('_token');

        Referencia::insert($datosReferencia);

        return redirect ('referencia')->with('mensaje','Referencia agregado exitosamente ');

    }

    public function show(referencia $referencia)
    {
        //
    }

    public function edit( $id)
    {
        //
        $clientes=Cliente::all();
        $referencia=Referencia::findOrfail($id);
        return view('referencia.edit', compact('referencia','clientes'));

    }


    public function update(Request $request, $id)
    {

        $campos= [
            'nombre'=>'required|alpha|min:2|max:100',
            'segnombre'=> 'nullable|alpha',
            'apellidopat'=>'required|alpha|min:2|max:100',
            'apellidomat'=>'required|alpha|min:2|max:100',
            'telefono'=>'required|numeric|digits:10',
            'parentesco'=>'required'

           ];

     $this->validate($request,$campos/*$mensaje*/);
     $datosReferencia = $request->except(['_token', '_method']);


     Referencia::where('id','=',$id)->update($datosReferencia);
     $referencia=Referencia::findOrFail($id);
//        return redirect ('referencia')->with('mensaje','Registro editado exitosamente ');



    return redirect()->route('cliente.show',$referencia->cliente_id);

    }

    public function destroy($id)
    {

        $referencia=Referencia::findOrFail($id);

        Referencia::destroy($id);
        //return redirect ('referencia')->with('mensaje','referencia eliminada exitosamente ');
        return redirect()->route('cliente.show',$referencia->cliente_id);

    }
}
