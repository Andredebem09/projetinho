@extends('layout')

@section('corpo')
    <div class="container">
        <h1>Tarefas Realizadas</h1>

        @if($tarefasRealizadas->isEmpty())
            <div class="alert alert-info">
                Nenhuma tarefa foi realizada ainda.
            </div>
        @else
            <ul>
                @foreach($tarefasRealizadas as $tarefa)
                    <li>{{ $tarefa->descricao }}</li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
