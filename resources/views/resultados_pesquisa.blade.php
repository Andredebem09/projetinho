@extends('layout')

@section('corpo')

<div class="corpo">
    <div class="container">

        @if($perguntas->isEmpty()) 
            <div class="alert alert-danger">
                <p>Nenhuma atividade encontrada.</p>
            </div>
            <a href="{{ route('index.envios') }}" class="btn btn-outline-info">Voltar</a>
        @else
            <h3>Resultados da Pesquisa:</h3>

            <div class="alert alert-success">
                <strong>Consulta Exata Encontrada!</strong> A seguinte atividade corresponde exatamente ao seu termo:
                <ul>
                    @foreach($perguntas as $duvidaExata)
                        <li>{{ $duvidaExata->duvida }}</li>
                    @endforeach
                </ul>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Número da Atividade</th>
                        <th>Nome da Pessoa</th>
                        <th>Dúvida</th>
                        <th>Detalhe</th>
                        <th>Imagem</th>
                        <th>Status</th>
                        <th>Respostas</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($perguntas as $pergunta)
                        <tr>
                            <td>{{ $pergunta->id }}</td>
                            <td>{{ $pergunta->nome_pessoa }}</td>
                            <td>{{ $pergunta->duvida }}</td>
                            <td>{{ $pergunta->detalhe }}</td>
                            <td>
                                @if($pergunta->imagem)
                                    <img src="{{ asset('storage/' . $pergunta->imagem) }}" alt="Imagem" style="max-width: 100%; height: auto;">
                                @else
                                    Sem imagem
                                @endif
                            </td>
                            <td>{{ $pergunta->status }}</td>
                            <td>
                                @foreach($pergunta->respostas as $resposta)
                                    <p>{{ $resposta->conteudo }}</p>
                                @endforeach
                                <a href="{{ route('forum.responder', $pergunta->id) }}" class="btn btn-outline-info">Responder</a>
                            </td>
                            <td>
                                <a href="{{ route('index.edit', $pergunta->id) }}" class="btn btn-outline-info">Editar</a>
                                <form action="{{ route('index.delete', $pergunta->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">Deletar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('index.envios') }}" class="btn btn-outline-info">Voltar</a>
        @endif

    </div>
</div>

@endsection
