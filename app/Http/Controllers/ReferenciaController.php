<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    $cliente=cliente::all();
    return view('referencia.createid',compact('id'));
}

public function storef(Request $request ,$id){

    $request->validate([
        'nombre'=>'required|alpha|min:2|max:100',
        'segnombre'=> 'nullable|alpha',
        'apellidopat'=>'required|alpha|min:2|max:100',
        'apellidomat'=>'required|alpha|min:2|max:100',
        'telefono'=>'required|numeric|digits:10',
        'parentesco'=>'required'
       ]);

        $referencia=Referencia::create([
        'nombre'=>$request->nombre,
        'segnombre'=>$request->segnombre,
        'apellidopat'=>$request->apellidopat,
        'apellidomat'=>$request->apellidomat,
        'parentesco'=>$request->parentesco,
        'telefono'=>$request->telefono,
        'cliente_id'=>$id
        ]);

        return redirect()->route('cliente.show',$id);

}


public function store(Request $request)
    {

    $request->validate([
        'nombre'=>'required|alpha|min:2|max:100',
        'segnombre'=> 'nullable|alpha',
        'apellidopat'=>'required|alpha|min:2|max:100',
        'apellidomat'=>'required|alpha|min:2|max:100',
        'telefono'=>'required|numeric|digits:10',
        'parentesco'=>'required'
       ]);

    Referencia::create($request->all());
    return redirect ('referencia')->with('mensaje','Referencia agregado exitosamente ');

    }


    public function show(referencia $referencia)
    {

    }

    public function edit( $id)
    {
        $clientes=Cliente::all();
        $referencia=Referencia::findOrfail($id);
        return view('referencia.edit', compact('referencia','clientes'));
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'nombre'=>'required|alpha|min:2|max:100',
            'segnombre'=> 'nullable|alpha',
            'apellidopat'=>'required|alpha|min:2|max:100',
            'apellidomat'=>'required|alpha|min:2|max:100',
            'telefono'=>'required|numeric|digits:10',
            'parentesco'=>'required'

           ]);

        $referencia=Referencia::where('id','=',$id)->update($request->except(['_token', '_method']));
        $referencia=Referencia::find($id);
        return redirect()->route('cliente.show',$referencia->cliente_id);

    }

    public function destroy($id)
    {
        $referencia=Referencia::findOrFail($id);
        Referencia::destroy($id);
        return redirect()->route('cliente.show',$referencia->cliente_id);
    }
}
