@extends('layout')

@section('corpo')

<div class="corpo">



        <div class="container">

                <h1>Responder Atividade</h1>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <h3>Pergunta: {{ $pergunta->duvida }}</h3>
                <p>{{ $pergunta->detalhe }}</p>

                <form action="{{ route('forum.salvarResposta', $pergunta->id) }}" method="POST">
                    @csrf
                    <input type="file" name="imagem" class="form-control">
                    <br>
                    <textarea class="form-control" name="conteudo" cols="30" rows="3" placeholder="Campo para observação"></textarea>
                    <br>
                    <button type="submit" class="btn btn-outline-info">Enviar Resposta</button>
                    <a href="{{route('index.envios')}}" class="btn btn-outline-info">voltar</a>
                    
                </form>


        </div>
</div>



@endsection
