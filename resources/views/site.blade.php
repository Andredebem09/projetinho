@extends('layout')

@section('corpo')

<div class="corpo">

<div class="container">

    
    <h1>Crie uma atividade:</h1>

<a href="{{route('index.forum')}}" class="btn btn-outline-info">Crie sua atividade</a>

<br>
<br>

    <h1>Veja suas Atividades:</h1>

<a href="{{route('index.envios')}}" class="btn btn-outline-info">Consulte as tarefas</a>




    

</div>

   

    

</div>

@endsection
