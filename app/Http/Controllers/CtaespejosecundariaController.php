<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use App\Models\ctaespejosecundaria;
use App\Models\ctaespejo;


use Illuminate\Http\Request;

class CtaespejosecundariaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
   
        $datos['ctaespejosecundarias']=ctaespejosecundaria::paginate(7);
        return view('ctaespejosecundaria.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //       
        $clientes=cliente::all();
        $ctaespejos=ctaespejo::all();      
        return view('ctaespejosecundaria.create',compact('ctaespejos','clientes'));

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

        $datosctaespejosecundaria = request()->except('_token');
        ctaespejosecundaria::insert($datosctaespejosecundaria);
        return redirect ('ctaespejosecundaria')->with('mensaje','cuenta agregado exitosamente ');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(ctaespejosecundaria $ctaespejosecundaria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        //
        $ctaespejos=ctaespejo::all();  
        $ctaespejosecundaria=ctaespejosecundaria::findOrfail($id);
        return view('ctaespejosecundaria.edit',compact('ctaespejosecundaria','ctaespejos'));

    }

    
    public function update(Request $request, $id)
    {
        
        $campos= [ 
            'usuario'=>'required|alpha_dash|min:2|max:100',
            'contrasenia'=>'required|alpha_dash|min:2|max:100'
           
           ];
        
        $this->validate($request,$campos/*$mensaje*/);
        $datosctaespejosecundaria = request()->except(['_token', '_method']);
    
        ctaespejosecundaria::where('id','=',$id)->update($datosctaespejosecundaria);
     $ctaespejosecundaria=ctaespejosecundaria::findOrFail($id);
        return redirect ('ctaespejosecundaria')->with('mensaje','Cuenta editada exitosamente ');
     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {     
        ctaespejosecundaria::destroy($id);
        return redirect ('ctaespejosecundaria')->with('mensaje','cuenta eliminada exitosamente ');
    }
}