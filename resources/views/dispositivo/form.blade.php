<h1>{{$modo}} dispositivo </h1>
<br>

    <div class="form-group">
        <label for="modelo">modelo</label>
        <input type="text" class="form-control" name="modelo"
        value="{{ isset($dispositivo->modelo)?$dispositivo->modelo:old('modelo')}}" id="modelo">
        @error('modelo');
        <small style ="color: red"> {{$message}}</small>
        @enderror
        <br>
    </div>

    <div class="form-group">
    <label for="noserie">noserie</label>
    <input type="text" class="form-control" name="noserie"
    value="{{isset($dispositivo->noserie)?$dispositivo->noserie:old('noserie') }}" id="noserie">
    @error('noserie');
    <small style ="color: red"> {{$message}}</small>
    @enderror
    <br>
    </div>

    <div class="form-group">
    <label for="imei">imei</label>
    <input type="text" class="form-control" name="imei"
    value="{{isset($dispositivo->imei)?$dispositivo->imei: old('imei')}}" id="imei" >
    @error('imei');
    <small style ="color: red"> {{$message}}</small>
    @enderror
    <br>
    </div>

{{--
    <div class="form-group">
        <label for="cliente_id">Cliente</label>
        <select class="form-control" name="cliente_id" >
            @foreach ($clientes as $cliente)
       <option value="{{isset($cliente->id)?$cliente->id:old('cliente_id')}}" id="cliente_id">{{ $cliente['nombre'] }} {{ $cliente['apellidopat'] }} {{ $cliente['apellidomat'] }} </option>
       @endforeach
              </select>




    <div class="form-group">
        <label for="vehiculo_id">vehiculo_id</label>
        <select class="form-control" name="vehiculo_id" >
            @foreach ($vehiculos as $vehiculo)
       <option value="{{isset($vehiculo->id)?$vehiculo->id:old('vehiculo_id')}}" id="vehiculo_id">{{ $vehiculo['marca'] }} {{ $vehiculo['modelo'] }}{{ $vehiculo['color'] }}  </option>
       @endforeach
              </select>

              --}}









    <div class="form-group">
    <input class="btn btn-success" type="submit" class="form-control" value="{{$modo}} datos">
    </div>

    <br><br>

    <div class="form-group">
    <a href="{{url('/referencia')}}" class="btn btn-dark" >Regresar</a>
    </div>
    <br>
