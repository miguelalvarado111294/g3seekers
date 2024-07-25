@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{url('/order')}}" method="post" enctype="multipart/form-data">
    @csrf
    @include('/order.form',['modo'=>'Crear']);
</form>
</div>
@endsection