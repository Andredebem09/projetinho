@extends('layout')

@section('corpo')

<div class="corpo">
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

        @if($pergunta->isEmpty())
            <div class="alert alert-danger">
                <p>Nenhuma atividade encontrada.</p>
            </div>
            <a href="{{ route('index.site') }}" class="btn btn-outline-info">Voltar</a>
        @else
            <form action="{{ route('index.pesquisa') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="query" placeholder="Pesquise sua atividade" required class="form-control">
                    <button type="submit" class="btn btn-outline-info">Pesquisar</button>
                </div>
            </form>

            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Número da atividade</th>
                        <th>Turma</th>
                        <th>Disciplina</th>
                        <th>Atividade</th>
                        <th>Imagem</th>
                        <th>Status</th>
                        <th>Respostas</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pergunta as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nome_pessoa }}</td>
                            <td>{{ $item->duvida }}</td>
                            <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 200px;">{{ $item->detalhe }}</td>
                            <td>
                                @if($item->imagem)
                                    <img src="{{ asset('storage/' . $item->imagem) }}" alt="Imagem" style="max-width: 80px; height: auto;">
                                @else
                                    Sem imagem
                                @endif
                            </td>
                            <td>{{ $item->status }}</td>
                            <td>
                                @foreach($item->respostas as $resposta)
                                    <p>{{ $resposta->conteudo }}</p>
                                @endforeach
                                <a href="{{ route('forum.responder', $item->id) }}" class="btn btn-outline-info">
                                    <i class="fas fa-reply"></i> Responder
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('index.edit', $item->id) }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('index.delete', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('index.site') }}" class="btn btn-outline-info">Voltar</a>
        @endif
    </div>
</div>

@endsection
