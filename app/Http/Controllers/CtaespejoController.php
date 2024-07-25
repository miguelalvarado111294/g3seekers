<?php

namespace App\Http\Controllers;

use App\Models\ctaespejo;
use Illuminate\Http\Request;
use App\Models\cuenta;
use App\Models\cliente;

class CtaespejoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
   
        $datos['ctaespejos']=Ctaespejo::paginate(7);
        return view('ctaespejo.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //     
        $cuentas=cuenta::all();
        $clientes=cliente::all();

        
        return view('ctaespejo.create',compact('cuentas','clientes'));

        

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $campos= [ 
            'usuario'=>'required|alpha_dash|min:2|max:100',
            'contrasenia'=>'required|alpha_dash|min:2|max:100'
           
           ];
        
         $this->validate($request,$campos/*$mensaje*/);
        $datosctaespejo = request()->except('_token');
        ctaespejo::insert($datosctaespejo);

        return redirect ('ctaespejo')->with('mensaje','cuenta agregada exitosamente ');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(ctaespejo $ctaespejo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        //
   


        $cuentas=cuenta::all();
        $clientes=cliente::all();
        $ctaespejo=ctaespejo::findORfail($id);
        return view('ctaespejo.edit', compact('cuentas','clientes','ctaespejo'));

    }

    
    public function update(Request $request, $id)
    {
        
        $campos= [ 
            'usuario'=>'required|alpha_dash|min:2|max:100',
            'contrasenia'=>'required|alpha_dash|min:2|max:100'
           
           ];
        
        $this->validate($request,$campos/*$mensaje*/);
        $datosctaespejo = request()->except(['_token', '_method']);
    
     ctaespejo::where('id','=',$id)->update($datosctaespejo);
     $ctaespejo=ctaespejo::findOrFail($id);
        return redirect ('ctaespejo')->with('mensaje','Cuenta editada exitosamente ');
     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {     
        ctaespejo::destroy($id);
        return redirect ('ctaespejo')->with('mensaje','cuenta eliminada exitosamente ');
    }
}