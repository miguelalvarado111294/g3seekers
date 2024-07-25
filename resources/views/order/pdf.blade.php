<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf </title>
</head>
<body>
   <h1>Orden de servicio</h1>
<h3>Datos de cliente</h3>
</br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
           {{-- <th>#</th>--}}
           <th>nombre socio </th>
           <th>telefono </th>
           <th>email </th>
                      
        </tr>
    </thead>

    <tbody>
@foreach ($orders as $order)  
        
        <tr>
           {{--  <td>{{$referencia->id}}</td>
            <td>{{$referencia->cliente->nombre}} {{$referencia->cliente->apellidopat}} {{$referencia->cliente->apellidomat}}</td>{{--campo para el cliente--}}
            <td>{{$order->cliente->nombre}} {{$order->cliente->apellidopat}} {{$order->cliente->apellidomat}}</td>{{--campo para el cliente--}}
            <td>{{$order->cliente->telefono}} </td>
            <td>{{$order->cliente->email}} </td>
        </tr>
            @endforeach
    </tbody>
</table>
<h3>Datos de vehiculo</h3>
</br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
           {{-- <th>#</th>--}}
           <th>marca </th>
           <th>modelo </th>
           <th>placas </th>
           <th>color </th>   
           <th>no serie </th>       
        </tr>
    </thead>

    <tbody>
@foreach ($orders as $order)  
        
        <tr>
            <td>{{$order->vehiculo->marca}}  </td>
            <td>{{$order->vehiculo->modelo}}</td>
            <td>{{$order->vehiculo->placas}}</td>
            <td>{{$order->vehiculo->color}}</td>
            <td>{{$order->vehiculo->noserie}}</td>
        </tr>
            @endforeach
    </tbody>
</table>
<h3>Datos de linea</h3>
</br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
           {{-- <th>#</th>--}}
           <th>linea </th>
           <th>sim card </th>
                      
        </tr>
    </thead>

    <tbody>
@foreach ($orders as $order)  
        
        <tr>
           {{--  <td>{{$referencia->id}}</td>
            <td>{{$referencia->cliente->nombre}} {{$referencia->cliente->apellidopat}} {{$referencia->cliente->apellidomat}}</td>{{--campo para el cliente--}}
            <td>{{$order->linea->telefono}}</td>
            <td>{{$order->linea->simcard}}</td>
        </tr>
            @endforeach
    </tbody>
</table>

<h3>Datos de linea</h3>
</br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
           {{-- <th>#</th>--}}
           <th>imei </th>
           <th>marca </th>
           <th>modelo </th>         
        </tr>
    </thead>

    <tbody>
@foreach ($orders as $order)  
        
        <tr>
            <td>{{$order->dispositivo->imei}}</td> 
           <td>{{$order->dispositivo->marca}}</td>
           <td>{{$order->dispositivo->modelo}}</td>
           <td></td>
        </tr>
            @endforeach
    </tbody>
</table>


</body>
</html>


