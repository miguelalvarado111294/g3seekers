hola putito {{$id}}

@extends('layouts.app')
@section('content')
<div class="container">

<form action=" {{route('dispositivop.crear', $id)}} " method="post">
@csrf

<div class="form-group">
<label>Modelo:</label>
<input type="text" class="form-control" name="modelo">
</div>
<br>

<div class="form-group">
<label>Numero de Serie :    </label>
<input type="text" class="form-control" name="noserie">
</div>
<br>

<div class="form-group">
<label>Imei:</label>
<input type="text" class="form-control" name="imei">
</div>
<br>


<div class="form-group">
    <label>   Comentarios:</label>
    <input type="text" class="form-control" name="comentarios">
</div>
<br>


<div class="form-group">
            <input type="submit" class="btn btn-success" value="Enviar Datos">
        </form>
    </div>
    </div>
    @endsection
