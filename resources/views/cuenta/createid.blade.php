@extends('layouts.app')
@section('content')
<div class="container">

<form action=" {{route('cuentap.crear', $id)}} " method="post">
@csrf

<div class="form-group">
<label>Usuario:</label>
<input type="text" class="form-control" name="usuario">
</div>
<br>

<div class="form-group">
<label>    Contraseña :    </label>
<input type="text" class="form-control" name="contrasenia">
</div>
<br>

<div class="form-group">
<label>Contraseña de Paro:</label>
<input type="text" class="form-control" name="contraseniaParo">
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
