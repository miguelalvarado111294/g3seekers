@extends('layouts.app')
@section('content')
<div class="container">


    <h1 style="text-align: center; display: inline-block; width: 100%; ">Datos de Socios</h1>

    @if(Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible" role="alert">
        {{Session::get('mensaje')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"> &times </span>
            </button>
            </div>
    @endif


    <form action="{{route('cliente.index')}}" method="get" class="text-center">
        @csrf
        <div class="btn-group" >
            <input type="text" name="busqueda" class="form-control" placeholder="ingresa nombre a buscar" >
            <input type="submit" value="enviar" class="btn btn-primary">

        </div>
    </form>
<br>
<a href="{{url('cliente/create')}}" class="btn btn-success" >Alta Nuevo Socio</a>



<br>
<br>

<br>
<ul>
    @foreach ($clientes as $cliente)
           <a href=" {{route('cliente.show' , $cliente->id)}}" style="text-align: center; display: inline-block; width: 100%; ">
                 {{--$cliente->dispositivos --}} {{$cliente->nombre}} {{$cliente->segnombre}} {{$cliente->apellidopat}} {{$cliente->apellidomat}}
            </a>
           @endforeach
    {!! $clientes->links()!!}
</ul>

</div>
@endsection
