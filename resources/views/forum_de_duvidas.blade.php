@extends('layout')

@section('corpo')

<div class="container">

    <h1>Nova Dúvida</h1>
    <form action="{{ route('index.postados') }}" method="POST" enctype="multipart/form-data">
        @csrf 
        <p>Coloque a dúvida</p>
        @if($errors->any())
            @foreach ($errors->all() as $erro)
                <p>{{ $erro }}</p>
            @endforeach
        @endif
        <input class="form-control" type="text" placeholder="Nome" name="nome_pessoa">
        <br>
        <p>Assunto:</p>
        <textarea class="form-control" name="duvida" cols="30" placeholder="Assunto"></textarea>
        <br>
        <p>Descreva:</p>
        <textarea class="form-control" name="detalhe"
        cols="30" placeholder= "Descrição"></textarea>

        <br>
        <input type="file" name="imagem" class="form-control">
        <br>
        <button type="submit" class="btn btn-outline-info">Enviar</button>
        <a href="{{ route('index.site') }}" class="btn btn-outline-info">Voltar</a>
    </form>

</div>

@endsection







