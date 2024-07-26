<?php

namespace App\Http\Controllers;

use App\Http\Requests\storecliente;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;

use App\Models\dispositivo;

use App\Models\cliente;
use App\Models\referencia;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;

class ClienteController extends Controller
{

    public function index(Request $request)
    {
/*
        $busqueda= $request->busqueda;
        $clientes['clientes']=cliente::where('rfc' , 'LIKE' , '%' . $busqueda . '%')
        ->orWhere('apellidopat' , 'LIKE' , '%' . $busqueda . '%')
        ->orWhere('telefono' , 'LIKE' , '%' . $busqueda . '%')
        ->paginate(10);
*/
        $clientes=Cliente::latest('id')->paginate(10);
        return view('cliente.index',compact('clientes'));

    }

    public function create()
    {
        return view('cliente.create');
    }

    public function store(storecliente $request)
    {

            $datosCliente = $request->except('_token');

            if($request->hasFile('actaconstitutiva')) {
            $datosCliente['actaconstitutiva']=$request->file('actaconstitutiva')->store('uploads','public');
            }

            if($request->hasFile('consFiscal')){
            $datosCliente['consFiscal']=$request->file('consFiscal')->store('uploads','public');
            }

            if($request->hasFile('comprDom')){
            $datosCliente['comprDom']=$request->file('comprDom')->store('uploads','public');
            }

            if($request->hasFile('tarjetacirculacion')){
            $datosCliente['tarjetacirculacion']=$request->file('tarjetacirculacion')->store('uploads','public');
            }

            if($request->hasFile('compPago')){
            $datosCliente['compPago']=$request->file('compPago')->store('uploads','public');
            }

            Cliente::insert($datosCliente);
            return redirect()->route('cliente.index');
    }


    public function show( $id)
    {
        //
    $cliente=cliente::findOrFail($id);
    $referencias=Referencia::where('cliente_id','LIKE','%' . $id . '%')->get();


    $data=[
    'cliente' =>$cliente,
    'referencias' => $referencias
    ];

       return view('cliente.show')->with($data);
    }


    public function clienteshow( $id)
    {
        //
        echo $id;
    $cliente=cliente::findOrFail($id);
    $referencias=referencia::where('cliente_id','LIKE','%' . $id . '%')
->get();

$data=[
    'cliente' =>$cliente,
    'referencias' => $referencias
];

       return view('cliente.show')->with($data);

    }

public function edit($id)
{

    $cliente=cliente::findOrfail($id);
    return view ('cliente.edit',compact('cliente'));
}


    public function update(Request $request, $id)
    {

        $campos= [
            'nombre'=>'required|alpha|min:2|max:100',
            'segnombre'=> 'nullable|alpha',
            'apellidopat'=>'required|alpha|min:2|max:100',
            'apellidomat'=>'required|alpha|min:2|max:100',
            'telefono'=>'required|numeric|digits:10|unique:clientes,telefono,'. $id,
            'direccion'=>'required',
            'email'=>'required|string|min:2|max:100|email|unique:clientes,email,'.$id,
            'rfc'=>'required|alpha_num|min:2|max:100|unique:clientes,rfc,'.$id,
            'actaconstitutiva'=>'mimes:pdf,jpeg,png,jpg|max:5000',
            'consFiscal'=>'mimes:pdf,jpeg,png,jpg|max:5000',
            'comprDom'=>'mimes:pdf,jpeg,png,jpg|max:5000',
            'tarjetacirculacion'=>'mimes:pdf,jpeg,png,jpg,pdf|max:5000',
            'compPago'=>'mimes:pdf,jpeg,png,jpg|max:5000'

           ];

        $this->validate($request,$campos/*$mensaje*/);
        $datosCliente = $request->except(['_token', '_method']);

        if( $request->hasFile('actaconstitutiva'))
        {
        $cliente=Cliente::findOrFail($id);
        Storage::delete('public/'. $cliente->actaconstitutiva);
        $datosCliente['actaconstitutiva']=$request->file('actaconstitutiva')->store('uploads','public');
        }

        if( $request->hasFile('consFiscal') )
        {
        $cliente=Cliente::findOrFail($id);
        $datosCliente['consFiscal']=$request->file('consFiscal')->store('uploads','public');
        Storage::delete('public/'. $cliente->consFiscal);
        }

        if( $request->hasFile('comprDom'))
        {
        $cliente=Cliente::findOrFail($id);
        Storage::delete('public/'. $cliente->comprDom);
        $datosCliente['comprDom']=$request->file('comprDom')->store('uploads','public');
        }


        if( $request->hasFile('tarjetacirculacion'))
        {
        $cliente=Cliente::findOrFail($id);
        Storage::delete('public/'. $cliente->tarjetacirculacion);
        $datosCliente['tarjetacirculacion']=$request->file('tarjetacirculacion')->store('uploads','public');
        }

        if( $request->hasFile('compPago'))
        {
        $cliente=Cliente::findOrFail($id);
        Storage::delete('public/'. $cliente->compPago);
        $datosCliente['compPago']=$request->file('compPago')->store('uploads','public');
        }

        Cliente::where('id','=',$id)->update($datosCliente);
        $cliente=Cliente::findOrFail($id);
        //return view ('cliente.edit', compact('cliente'));

        return redirect ('cliente')->with('mensaje','Cliente editado exitosamente ');
    }

    public function destroy($id)
    {
        $cliente=Cliente::findOrFail($id);
  /*     if(Storage::delete('public/'. $cliente->actaconstitutiva)){
  espacio para eliminar foto del storage implemetntar ... mas tardee :9
      }*/
    Cliente::destroy($id);
    return redirect ('cliente')->with('mensaje','Cliente eliminado exitosamente ');
    }

public function buscararchivos($id){



    $archivos=Cliente::find($id);

    return view('cliente.archivos',compact('archivos'));


}


}
