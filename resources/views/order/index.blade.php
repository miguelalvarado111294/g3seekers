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
<a href="{{url('order/create')}}" class="btn btn-success" >Registrar nueva order</a>


<a href="{{url('order/pdf')}}" class="btn btn-success" >pdf</a>



<br><br><br>
<h1>Datos de Orden</h1>
</br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
           {{-- <th>#</th>--}}
           <th>fechasolicitud</th>
            <th>fechavisita</th> 
            <th>costo</th>
            <th>vigencia</th>
            <th>cliente_id</th>
            <th>vehiculo_id</th>
            <th>linea_id</th>
            <th>tiposerv_id</th>
            <th>dispositivo_id</th>
            <th>acciones</th>
                      
        </tr>
    </thead>

    <tbody>
        @foreach ($orders as $order)  
        
        <tr>
           {{--  <td>{{$referencia->id}}</td>
            <td>{{$referencia->cliente->nombre}} {{$referencia->cliente->apellidopat}} {{$referencia->cliente->apellidomat}}</td>{{--campo para el cliente--}}
            <td>{{$order->fechasolicitud}}</td>  
            <td>{{$order->fechavisita}}</td>  
            <td>{{$order->costo}}</td>
            <td>{{$order->vigencia}}</td>
            <td>{{$order->cliente->nombre}} {{$order->cliente->apellidopat}} {{$order->cliente->apellidomat}}</td>{{--campo para el cliente--}}
            <td>{{$order->vehiculo->marca}} {{$order->vehiculo->modelo}} {{$order->vehiculo->color}}</td>
            <td>{{$order->linea->telefono}}</td>
            <td>{{$order->tiposervicio->tiposervicio}}</td>
           <td>{{$order->dispositivo->modelo}}</td>  
            <td>acciones</td>
         <td>
                    <a href="{{url('/order/' . $order->id . '/edit')}}" class="btn btn-warning" >Editar</a>
                    -
                    <form action="{{url('/order/' .  $order->id)}}" method="post" class="d-inline">
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
{!! $orders->links()!!}


</div>
@endsection