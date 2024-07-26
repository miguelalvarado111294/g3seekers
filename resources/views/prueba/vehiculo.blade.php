
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



<a href="{{route('vehiculof.crear' ,  $id)}}" class="btn btn-success" >Registrar nuevo vehiculo</a>

<br><br>
            <h1>Vehiculos Adjuntos de Socios cn id {{$id}} </h1>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>Id del dispositivo</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Color</th>
            <th>Placa</th>
            <th>Tipo de Unidad</th>
            <th>Numero de Serie</th>
            <th>Acciones</th>
            <th></th>

         </tr>
    </thead>

    <tbody>
        @foreach ($vehiculos as $vehiculo)
        <tr>
          <td>id  </td>
          <td>{{$vehiculo->marca}} </td>
          <td>{{$vehiculo->modelo}}</td>
          <td>{{$vehiculo->color}} </td>
          <td>{{$vehiculo->placa}} </td>
          <td> {{$vehiculo->placa}} </td>
          <td>{{$vehiculo->noserie}}</td>
          <td> <a href="{{route('buscar.dispositivo' , $vehiculo->cliente_id)}}" class="btn btn-primary" >Dispositivo</a>
          </td>
          <td>

            <a href="{{url('/vehiculo/' . $vehiculo->id . '/edit')}}" class="btn btn-warning" >Editar</a>

            <form action="{{url('/vehiculo/' .  $vehiculo->id)}}" method="post" class="d-inline">
                @csrf
                {{ method_field('DELETE') }}
                <input class="btn btn-danger" type="submit" onclick=" return confirm('seguro quieres eliminar?')"
                value="Borrar">
            </form>

          </td>

          <td>


    </td>
        @endforeach
    </tbody>
</table>



</div>
@endsection

