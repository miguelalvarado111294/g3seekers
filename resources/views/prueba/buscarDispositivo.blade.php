
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

        <a href="{{route('dispositivof.crear', $id)}}" class="btn btn-warning" >Asignar dispositivo</a>


<br><br>
<h1>Datos de dispositivo</h1>
</br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>

            <th>Modelo</th>
            <th>Numero de Serie</th>
            <th>Imei</th>
            <th></th>
            <th></th>
            <th>Acciones</th>

        </tr>
    </thead>

<tbody>
       @foreach ($dispositivos as $dispositivo)
        <tr>
           {{-- <td> {{$dispositivo->cliente->nombre}} {{$dispositivo->cliente->segnombre}} {{$dispositivo->cliente->apellidopat}} {{$dispositivo->cliente->apellidomat}} </td>
            --}}<td> {{$dispositivo->id}} {{$dispositivo->modelo}}</td>
            <td>{{$dispositivo->noserie}}</td>
            <td>{{$dispositivo->imei}}</td>
<td>

</td>
<td>
    <a href="{{route('buscar.linea' , $dispositivo->cliente->id)}}" class="btn btn-warning" >Linea</a>
    <a href="{{route('buscar.sensor', $dispositivo->id)}}" class="btn btn-warning" >Sensor</a></td>

</td>
            <td>
                    <a href="{{url('/dispositivo/' . $dispositivo->id . '/edit')}}" class="btn btn-warning" >Editar</a>

                    <form action="{{url('/dispositivo/' .  $dispositivo->id)}}" method="post" class="d-inline">
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
<br><br><br>



</div>
@endsection
