<h1>{{$modo}} Linea </h1>
<br>

    <div class="form-group">
    <label for="nombre">simcard</label>

    <input type="text" class="form-control" name="simcard"
    value="{{ isset($linea->simcard)?$linea->simcard:old('simcard')}}" id="simcard">
    @error('simcard');
    <small style ="color: red"> {{$message}}</small>
    @enderror

    <br>
    </div>

    <div class="form-group">
    <label for="telefono">telefono</label>
    <input type="text" class="form-control" name="telefono"
    value="{{isset($linea->telefono)?$linea->telefono:old('telefono') }}" id="telefono">
    @error('telefono');
    <small style ="color: red"> {{$message}}</small>
    @enderror

    <br>
    </div>
    <div class="form-group">
    <label for="tipolinea">tipolinea</label>
    <input type="text" class="form-control" name="tipolinea"
    value="{{isset($linea->tipolinea)?$linea->tipolinea: old('tipolinea')}}" id="tipolinea" >
    @error('tipolinea');
    <small style ="color: red"> {{$message}}</small>
    @enderror
    <br>

    <div class="form-group">
        <label for="renovacion">renovacion</label>
        <input type="text" class="form-control" name="renovacion"
        value="{{isset($linea->renovacion)?$linea->renovacion: old('renovacion')}}" id="renovacion" >
        @error('renovacion');
        <small style ="color: red"> {{$message}}</small>
        @enderror
        <br>


        <div class="form-group">
            <label for="cliente_id">Cliente</label>
            <select class="form-control" name="cliente_id" >
                @foreach ($clientes as $cliente)
           <option value="{{isset($cliente->id)?$cliente->id:old('cliente_id')}}" id="cliente_id">

            {{ $cliente['nombre'] }} {{ $cliente['apellidopat'] }} {{ $cliente['apellidomat'] }}

            </option>
                @endforeach
                  </select>

                  <div class="form-group">
                    <label for="dispositivo_id">dispositivo_id</label>
                    <select class="form-control" name="dispositivo_id" >
                        @foreach ($dispositivos as $dispositivo)
                   <option value="{{isset($dispositivo->id)?$dispositivo->id:old('dispositivo_id')}}" id="dispositivo_id">

                    {{ $dispositivo['modelo'] }} {{ $dispositivo['imei'] }}

                    </option>
                        @endforeach
                          </select>







    <div class="form-group">
    <input class="btn btn-success" type="submit" class="form-control" value="{{$modo}} datos">


    </div>

    <br><br><br>

    <div class="form-group">
    <a href="{{url('/linea')}}" class="btn btn-dark" >Regresar</a>
    </div>
    <br>
