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
<a href="{{url('ctaespejo/create')}}" class="btn btn-success" >Registrar nueva cuenta</a>
<br><br><br>
<h1>Datos de Cuenta Espejo</h1>
</br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>usuario</th> 
            <th>contrasenia</th>
            <th>cliente</th>

            <th>acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($ctaespejos as $ctaespejo)  
        
        <tr>
            <td>{{$ctaespejo->id}}</td>
            <td>{{$ctaespejo->usuario}}</td>  
            <td>{{$ctaespejo->contrasenia}}</td>  
            <td>{{$ctaespejo->cliente->nombre}} {{$ctaespejo->cliente->apellidopat}} {{$ctaespejo->cliente->apellidomat}}</td>{{--campo para el cliente--}}

            <td>
                    <a href="{{url('/ctaespejo/' . $ctaespejo->id . '/edit')}}" class="btn btn-warning" >Editar</a>
                    -
                    <form action="{{url('/ctaespejo/' .  $ctaespejo->id)}}" method="post" class="d-inline">
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
{!! $ctaespejos->links()!!}


</div>
@endsection