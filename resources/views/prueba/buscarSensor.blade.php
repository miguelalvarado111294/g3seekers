@extends('layouts.app')
@section('content')
<div class="container">

    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
    {{Session::get('mensaje')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>  
</div>
    @endif


<br><br>
<a href="{{url('sensor/create')}}" class="btn btn-success" >Registrar nuevo sensor</a>
<br><br><br>
<h1>Datos de sensores</h1>
</br>
<table class="table table-dark">
    <thead class="thead-light">
        <tr>
           {{-- <th>#</th>--}}
            <th>Marca</th> 
            <th>Modelo</th>
            <th>Numero de Serie</th>
            <th>Tipo</th>
            <th>Dispositivo</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($sensors as $sensor)  
        
        <tr>
            <td>{{$sensor->marca}} </td>
            <td>{{$sensor->modelo}}</td>  
            <td>{{$sensor->noserie}}</td>
            <td>{{$sensor->tipo}}</td>
            <td>{{$sensor->dispositivo->id}}</td>

            
            <td>
                    <a href="{{url('/sensor/' . $sensor->id . '/edit')}}" class="btn btn-warning" >Editar</a>
                    -
                    <form action="{{url('/sensor/' .  $sensor->id)}}" method="post" class="d-inline">
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


</div>
@endsection