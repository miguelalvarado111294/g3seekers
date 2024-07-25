@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/order/' . $order->id)}}" method="post" > >
@csrf
{{method_field('PATCH')}}
@include('/order.form',['modo'=>'Editar']);
</form>

</div>
@endsection