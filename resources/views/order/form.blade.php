<h1>{{$modo}} order </h1>
<br>

<div class="form-group">
    <label for="fechasolicitud">fechasolicitud</label>
    <input type="text" class="form-control" name="fechasolicitud" 
    value="{{ isset($order->fechasolicitud)?$order->fechasolicitud:old('fechasolicitud')}}" id="fechasolicitud">
    @error('fechasolicitud');
    <small style ="color: red"> {{$message}}</small>
    @enderror
    <br>
</div>

    <div class="form-group">
        <label for="fechavisita">fechavisita</label>
        <input type="text" class="form-control" name="fechavisita" 
        value="{{ isset($order->fechavisita)?$order->fechavisita:old('fechavisita')}}" id="fechavisita">
        @error('fechavisita');
        <small style ="color: red"> {{$message}}</small>
        @enderror
        <br>
    </div>

    <div class="form-group">
    <label for="costo">costo</label>
    <input type="text" class="form-control" name="costo" 
    value="{{isset($order->costo)?$order->costo:old('costo') }}" id="costo">
    @error('costo');
    <small style ="color: red"> {{$message}}</small>
    @enderror
    <br>
    </div>
 
    <div class="form-group">
        <label for="vigencia">vigencia</label>
        <input type="text" class="form-control" name="vigencia" 
        value="{{isset($order->vigencia)?$order->vigencia:old('vigencia') }}" id="vigencia">
        @error('vigencia');
        <small style ="color: red"> {{$message}}</small>
        @enderror
        <br>
        </div>


    <div class="form-group">
        <label for="cliente_id">cliente_id</label>
        <select class="form-control" name="cliente_id" >
            @foreach ($clientes as $cliente)
       <option value="{{isset($cliente->id)?$cliente->id:old('cliente_id')}}" id="cliente_id">{{ $cliente['nombre'] }}  </option>
       @endforeach
              </select>
            </div>
              <br>

             
   
<div class="form-group">
    <label for="linea_id">linea_id</label>
    <select class="form-control" name="linea_id" >
        @foreach ($lineas as $linea)
   <option value="{{isset($linea->id)?$linea->id:old('linea_id')}}" id="linea_id">{{ $linea['telefono'] }} {{-- {{ $linea['modelo'] }} {{ $linea['color'] }} --}}</option>
   @endforeach
          </select>
    <br>

  

        <div class="form-group">
            <label for="vehiculo_id">vehiculo_id</label>
            <select class="form-control" name="vehiculo_id" >
                @foreach ($vehiculos as $vehiculo)
           <option value="{{isset($vehiculo->id)?$vehiculo->id:old('vehiculo_id')}}" id="vehiculo_id">{{ $vehiculo['marca'] }} {{ $vehiculo['modelo'] }}</option>
           @endforeach
                  </select>
            <br>


            <div class="form-group">
                <label for="dispositivo_id">dispositivo_id</label>
                <select class="form-control" name="dispositivo_id" >
                    @foreach ($dispositivos as $dispositivo)
               <option value="{{isset($dispositivo->id)?$dispositivo->id:old('dispositivo_id')}}" id="dispositivo_id">{{ $dispositivo['marca'] }} {{ $dispositivo['modelo'] }}</option>
               @endforeach
                      </select>
                <br>


                <div class="form-group">
                    <label for="tiposerv_id">tiposervicio_id</label>
                    <select class="form-control" name="tiposerv_id" >
                        @foreach ($tiposervicios as $tiposervicio)
                   <option value="{{isset($tiposervicio->id)?$tiposervicio->id:old('tiposerv_id')}}" id="tiposerv_id">{{ $tiposervicio['tiposervicio'] }} </option>
                   @endforeach
                          </select>
                    <br>

        <br>
 
    <div class="form-group">
    <input class="btn btn-success" type="submit" class="form-control" value="{{$modo}} datos"> 
    </div>

    <br><br>

    <div class="form-group">
    <a href="{{url('/order')}}" class="btn btn-dark" >Regresar</a>
    </div>
    <br>