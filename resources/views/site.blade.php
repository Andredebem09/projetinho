@extends('layout')

@section('corpo')

<div class="corpo">

<div class="container">

    <h1>link para as paginas</h1>

    <a href="{{route('index.forum')}}" class="btn btn-outline-info">ir para o forum de duvidas</a>
    <br>

    <a href="{{route('index.envios')}}" class="btn btn-outline-info">consulta do forum</a>

</div>

   

    

</div>

@endsection
