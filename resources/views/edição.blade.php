@extends('layout')

@section('corpo')

<div class="corpo_2">
    <div class="container">

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

        <h1>Edite sua dúvida, {{$pergunta->nome_pessoa}}<br>
            Pergunta: {{$pergunta->duvida}}</h1>

        <form action="{{ route('index.atualizar', ['id' => $pergunta->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf  
            @method('PUT')

            <textarea class="form-control" placeholder="Edite seu nome" cols="20" rows="3" name="nome_pessoa">{{$pergunta->nome_pessoa}}</textarea>

            <br>

            <textarea class="form-control" placeholder="Edite o assunto" cols="20" rows="3" name="duvida">{{$pergunta->duvida}}</textarea>

            <br>
            
            <textarea placeholder="Atualize os detalhes do assunto" class="form-control" cols="30" rows="5" name="detalhe">{{$pergunta->detalhe}}</textarea>

            <br>

             @if($pergunta->imagem)
                <div>
                    <p>Imagem atual:</p>
                    <img src="{{ asset('storage/' . $pergunta->imagem) }}" alt="Imagem" style="max-width: 200px;">
                </div>
                <br>
            @endif
            <label for="imagem">Escolha uma nova imagem (opcional):</label>
            <input type="file" name="imagem" class="form-control" accept="image/*">

            <br>
                
            <button type="submit">Atualizar informações</button>
        </form>
    </div>
</div>

@endsection









    




