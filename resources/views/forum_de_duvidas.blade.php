@extends('layout')

@section('corpo')

<div class="container">

<h1>Nova Atividade</h1>
    <form action="{{ route('index.postados') }}" method="POST" enctype="multipart/form-data">
        @csrf 
        <p>Insira sua turma</p>
        @if($errors->any())
            @foreach ($errors->all() as $erro)
                <p>{{ $erro }}</p>
            @endforeach
        @endif
        <input class="form-control" type="text" placeholder="insira a turma" name="nome_pessoa">
        <br>
        <p>Diciplina:</p>
        <input class="form-control" type="text" placeholder="Nome da diciplina" name="duvida">
        
        <!--<textarea class="form-control" name="duvida" cols="30" placeholder="insira a //??Diciplina"></textarea>!-->
        <br>
        <p>Atividade:</p>
        <textarea class="form-control" name="detalhe"
        cols="30" placeholder= "Insira a Atividade"></textarea>

        <br>
        <input type="file" name="imagem" class="form-control">
        <br>
        <button type="submit" class="btn btn-outline-info">Enviar</button>
        <a href="{{ route('index.site') }}" class="btn btn-outline-info">Voltar</a>
    </form>
     
</div>

@endsection







