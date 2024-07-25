@extends('layouts.app')
@section('content')
<div class="container">

    @if(Session::has('mensaje'))
    <div class="alert alert-success alert dismissible" role="alert">
    {{Session::get('mensaje')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

<br><br>
<a href="{{url('cuenta/create')}}" class="btn btn-success" >Registrar nueva cuenta</a>
<br><br><br>
<h1>Datos de Cuentas</h1>
</br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
           {{-- <th>#</th>--}}
           <th>cliente</th>
            <th>usuario</th> 
            <th>contrasenia</th>
            <th>vehiculo</th>
            <th>contraseniaParo</th>
            
        </tr>
    </thead>

    <tbody>
        @foreach ($cuentas as $cuenta)  
        
        <tr>
          <td>{{$cuenta->cliente->nombre}} {{$cuenta->cliente->apellidopat}} {{$cuenta->cliente->apellidomat}}</td>
            <td>{{$cuenta->usuario}}</td>  
            <td>{{$cuenta->contrasenia}}</td>  
            <td>{{$cuenta->contraseniaParo}}</td>
            <td>
                    <a href="{{url('/cuenta/' . $cuenta->id . '/edit')}}" class="btn btn-warning" >Editar</a>
                    -
                    <form action="{{url('/cuenta/' .  $cuenta->id)}}" method="post" class="d-inline">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input class="btn btn-danger" type="submit" onclick=" return confirm('seguro quieres eliminar?')" 
                    value="Borrar">
                    </form>
            </td>

        </tr>
            @endforeach
    </tbody>
</table>
{!! $cuentas->links()!!}


</div>
@endsection