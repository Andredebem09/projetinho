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

        <form action="{{ route('index.pesquisa') }}" method="GET">
            <input type="text" name="query" placeholder="Pesquise sua atividade" required class="form-control">
            <button type="submit" class="btn btn-outline-info">Pesquisar</button>
        </form>

        <h3>Tarefas Pendentes</h3>

       
            <table style="width: 100%; border-collapse: separate; border-spacing: 15px;">
                <thead>
                    <tr>
                        <th>Numero da Atividade</th>
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
                <table style="width: 100%; border-collapse: separate; border-spacing: 15px;">
            <thead>
                <tr>
                    <th>numero da atividade</th>
                    <th>Turma</th>
                    <th>Diciplina</th>
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
                        <td style="padding: 10px;">{{ $item->id }}</td>
                        <td style="padding: 10px;">{{ $item->nome_pessoa }}</td>
                        <td style="padding: 10px;">{{ $item->duvida }}</td>
                        <td style="padding: 10px;">{{ $item->detalhe }}</td>
                        <td style="padding: 10px;">
                            @if($item->imagem)
                                <img src="{{ asset('storage/' . $item->imagem) }}" alt="Imagem" style="max-width: 100%; height: auto;">
                            @else
                                Sem imagem
                            @endif
                        </td>
                        <td style="padding: 10px;">{{ $item->status }}</td>
                        <td style="padding: 10px;">
                            @foreach($item->respostas as $resposta)
                                <p>{{ $resposta->conteudo }}</p>
                            @endforeach
                            <a href="{{ route('forum.responder', $item->id) }}" class="btn btn-outline-info">Responder</a>
                        </td>
                        <td style="padding: 10px;">
                            <a href="{{ route('index.edit', $item->id) }}" class="btn btn-outline-info">Editar</a>
                            <br><br>
                            <form action="{{ route('index.delete', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-info">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('index.site') }}" class="btn btn-outline-info">Voltar</a>
        
</form>
                </tbody>
            </table>
        @endif
        <a href="{{ route('index.site') }}" class="btn btn-outline-info">Voltar</a>
    </div>
</div>

@endsection
