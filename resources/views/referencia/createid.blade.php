@extends('layouts.app')
@section('content')
<div class="container">

<form action=" {{route('referenciap.crear', $id)}} " method="post">
@csrf

<div class="form-group">
<label>Nombre:</label>
<input type="text" class="form-control" name="nombre">
</div>
<br>

<div class="form-group">
<label>    Segundo Nombre:    </label>
<input type="text" class="form-control" name="segnombre">
</div>
<br>

<div class="form-group">
<label>Apellido paterno:</label>
<input type="text" class="form-control" name="apellidopat">
</div>
<br>


<div class="form-group">
    <label>    Apellido materno:</label>
    <input type="text" class="form-control" name="apellidomat">
</div>
<br>

    <div class="form-group">
    <label>Parentesco:</label>
    <input type="text" class="form-control" name="parentesco">
</div>
<br>

    <div class="form-group">
    <label>Telefono:</label>
    <input type="text" class="form-control" name="telefono">
</div>
<br>

<div class="form-group">
            <input type="submit" class="btn btn-success" value="Enviar Datos">
        </form>
    </div>
    </div>
    @endsection
