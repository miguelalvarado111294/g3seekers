@extends('layouts.app')
@section('content')
<div class="container">


<table class="table table-light">
    <thead class="thead-light">
        <tr>

            <th>Acta Constitutiva</th>
            <th>Constancia de Situacion Fiscal</th>
            <th>Comprobante Domicilio</th>
            <th>Tarjeta Circulacion</th>
            <th>Comprobante Pago</th>
         </tr>
    </thead>

    <tbody>
        <tr>
            <td><img src="{{ asset('storage') . '/' . $archivos->actaconstitutiva    }}" width="200" alt=""> </td>
            <td><img src="{{ asset('storage') . '/' . $archivos->consFiscal  }}" width="200" alt="">         </td>
            <td><img src="{{ asset('storage') . '/' . $archivos->comprDom    }}" width="200" alt="">               </td>
            <td><img src="{{ asset('storage') . '/' . $archivos->tarjetacirculacion }}"  width="200" alt=""> </td>
            <td><img src="{{ asset('storage') . '/' . $archivos->compPago    }}" width="200" alt="">            </td>
        </tr>
    </tbody>
</table>
    <br>
    <br>




    <div class="form-group">
    <a href="{{ URL::previous() }}" class="btn btn-dark">Regresar</a>
        </div>
        <br>


</div>
@endsection

