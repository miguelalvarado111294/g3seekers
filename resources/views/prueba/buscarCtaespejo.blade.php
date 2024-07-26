
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
            <th>Usuario</th>
            <th>Contraseña</th>
            <th>¬¬</th>
            <th>Acciones</th>
         </tr>
    </thead>
@foreach ($ctaespejos as $ctaespejo)


    <tbody>
        <tr>
            <td>{{$ctaespejo->id}}</td>
            <td>{{$ctaespejo->usuario}}</td>
            <td>{{$ctaespejo->contrasenia}}</td>

            <td>
                <a href="{{url('/cuenta/' . $ctaespejo->id . '/edit')}}" class="btn btn-warning" >Editar</a>
                -
                <form action="{{url('/cuenta/' .  $ctaespejo->id)}}" method="post" class="d-inline">
                @csrf
                {{ method_field('DELETE') }}
                <input class="btn btn-danger" type="submit" onclick=" return confirm('seguro quieres eliminar?')"
                value="Borrar">
                </form>
        </td>
        @endforeach
    </tbody>
</table>


</div>
@endsection

