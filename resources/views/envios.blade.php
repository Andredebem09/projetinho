@extends('layout')

@section('corpo')

<div class="corpo">
    <div class="container">
        <!-- Alertas de Sucesso ou Erro -->
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

        <table style="width: 100%; border-collapse: separate; border-spacing: 15px;">
            <thead>
                <tr>
                    <th scope="col">Pergunta</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Pergunta</th>
                    <th scope="col">Detalhe</th>
                    <th scope="col">Imagem</th>
                    <th scope="col">Ações</th>
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
                        <td>
                            <a href="{{ route('index.edit', $item->id) }}" class="btn btn-outline-info">editar</a>

                            <br>


                            <form action="{{ route('index.delete', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-info">Deletar</button>
                        </form>
                            
                
                        </form>
                        </td>



                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('index.site') }}" class="btn btn-outline-info">Voltar</a>
    </div>
</div>

@endsection
