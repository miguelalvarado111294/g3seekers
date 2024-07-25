
@extends('layouts.app')
@section('content')
<div class="container">


<form action="{{route('vehiculop.crear', $id)}}" method="post">
@csrf
<div class="form-group">
<label>Marca:</label>
<input type="text" class="form-control" name="marca">
</div>
<br>

<div class="form-group">
<label>Modelo</label>
<input type="text" class="form-control" name="modelo">
</div>
<br>

<div class="form-group">
<label>Numero de Serie</label>
<input type="text" class="form-control" name="noserie">
</div>
<br>


<div class="form-group">
    <label>Numero de Placa:</label>
    <input type="text" class="form-control" name="placa">
</div>
<br>

    <div class="form-group">
    <label>Color:</label>
    <input type="text" class="form-control" name="color">
</div>
<br>

<div class="form-group">
    <label>Tipo de Vehiculo:</label>

    <select name="tipo" class="form-control">
    <option value="trailer">Trailer</option>
    <option value="tractocamion" selected>Tractocamion</option>
    <option value="motoneta">Motoneta</option>
    <option value="motocicleta">Motocicleta</option>
    <option value="auto">Auto</option>
    <option value="barco">Barco</option>
    <option value="maquinaria_pesada">Maquinaria Pesada</option>
    <option value="otro">Otro</option>
</select>

</div>


 {{--   <div class="form-group">
    <label>Tipo:</label>
    <input type="text" class="form-control" name="tipo">
</div>--}}
<br>
<div class="form-group">
    <label>Comentarios:</label>
    <input type="text" class="form-control" name="comentarios">
</div>
<br>



{{--
<div class="form-group">
    <div class="form-group">
        <label for="cuenta_id">cuentas</label>
        <select class="form-control" name="cuenta_id" >
            @foreach ($cuentas as $cuenta)
       <option value="{{isset($cuenta->id)?$cuenta->id:old('cuenta_id')}}" id="cuenta_id">

        {{ $cuenta['usuario'] }}

    </option>

    @endforeach

</select>
        </form>
    </div> --}}
<input type="submit" class="btn btn-success" value="Enviar Datos">

    </div>
    @endsection
