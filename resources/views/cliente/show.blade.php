@extends('layouts.app')
@section('content')
<div class="container">

<h1 >Datos Personales</h1>

<ul >

         Nombre :            {{$cliente->nombre}} <br>
        Segundo Nombre :    {{$cliente->segnombre}}<br>
        Apellido Paterno :  {{$cliente->apellidopat}}<br>
        Apellido Materno :  {{$cliente->apellidomat}} <br>
        Telefono :          {{$cliente->telefono}} <br>
        Direccion :         {{$cliente->direccion}} <br>
        Email :             {{$cliente->email}} <br>
        RFC :               {{$cliente->rfc}} <br>

    </ul>
    <a href="{{route('buscar.buscararchivos' , $cliente->id)}}" class="btn btn-primary" style="text-align: center; display: inline-block; width: 17%; ">Documentos electronicos</a>

<a href=  {{route('buscar.cuenta', $cliente->id)}}  style="text-align: center; display: inline-block; width: 17%;" class="btn btn-success" >Cuenta</a>
<br>
    <a href="{{url('/cliente/' . $cliente->id . '/edit')}}" style="text-align: center; display: inline-block; width: 17%; " class="btn btn-warning" >Editar</a>
<form action="{{url('/cliente/' .  $cliente->id)}}" method="post" class="d-inline">
    @csrf
    {{ method_field('DELETE') }}
    <input class="btn btn-danger" style="text-align: center; display: inline-block; width: 17%; " type="submit" onclick=" return confirm('seguro quieres eliminar?')"
    value="Borrar">
</form>




{{--

--}}

<h1>Referencias </h1><a href="{{route('referenciaf.crear' ,  $cliente->id)}}"
    class="btn btn-success" >Registrar nuevo referencia</a>
<br>


<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th># </th>
            <th>Nombre</th>
            <th>Segundo Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Paterno</th>
            <th>Parentesco</th>
            <th>Telefono</th>
            <th>Acciones</th>
         </tr>
    </thead>

    <tbody>
        @foreach ($referencias as $referencia )
        <tr>
            <td>  </td>
            <td>{{$referencia->nombre}}</td>
            <td>{{$referencia->segnombre}}</td>
            <td>{{$referencia->apellidopat}}</td>
            <td>{{$referencia->apellidomat}}</td>
            <td>{{$referencia->parentesco}}</td>
            <td>{{$referencia->telefono}}</td>
            <td>

                <a href="{{url('/referencia/' . $referencia->id . '/edit')}}" class="btn btn-warning" >Editar</a>
                -
                <form action="{{url('/referencia/' .  $referencia->id)}}" method="post" class="d-inline">
                @csrf
                {{ method_field('DELETE') }}
                <input class="btn btn-danger" type="submit" onclick=" return confirm('seguro quieres eliminar?')"
                value="Borrar">
                </form>
            </td>
        @endforeach
    </tbody>
</table>
<br><br><br>


</div>
@endsection
