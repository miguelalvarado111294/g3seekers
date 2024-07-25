
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

<br>
<br>
<br>
<a href="{{url('cuenta/create')}}" class="btn btn-success" >Registrar nueva cuenta</a>

<br>
            <h1>Cuenta Espejo de Socio</h1>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <td>id</td>
            <th>Cliente</th>
            <th>Usuario</th>
            <th>Contraseña</th>
            <th>¬¬</th>
            <th>Acciones</th>
         </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{$ctaespejos->id}}</td>
            <td>{{$ctaespejos->cliente->nombre}} {{$ctaespejos->cliente->apellidopat}}</td>
            <td>{{$ctaespejos->usuario}}</td>
            <td>{{$ctaespejos->contrasenia}}</td>

            <td>

                <form action="{{url('/prueba/' .  $ctaespejos->id . '/buscarCtasecundaria') }}"  method="get" class="d-inline">
                    @csrf
                    <input class="btn btn-primary" type="submit" value="Cuentas Secundariaas" >
                </form>

            </td>

            <td>
                <a href="{{url('/cuenta/' . $ctaespejos->cliente->id . '/edit')}}" class="btn btn-warning" >Editar</a>
                -
                <form action="{{url('/cuenta/' .  $ctaespejos->cliente->id)}}" method="post" class="d-inline">
                @csrf
                {{ method_field('DELETE') }}
                <input class="btn btn-danger" type="submit" onclick=" return confirm('seguro quieres eliminar?')"
                value="Borrar">
                </form>
        </td>
    </tbody>
</table>


</div>
@endsection

