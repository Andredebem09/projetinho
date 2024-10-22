<?php
namespace App\Services;

use App\Models\forum;
use stdClass;

class SupportService
{
    protected $repositorio;

    // Injetando um repositório customizado em vez de Illuminate\Cache\Repository
    public function __construct($repositorio) 
    {
        $this->repositorio = $repositorio;
    }

    // Obtém todos os registros do repositório
    public function getAll(string $filter = null): array
    {
        return $this->repositorio->getAll($filter); 
    }

    // Busca uma única instância
    public function findOne(string $id): stdClass|null
    {
        return $this->repositorio->findOne($id); 
    }

    // Cria um novo registro
    public function create(
        string $nome_pessoa,
        string $duvida,
        string $status,
        string $detalhe
    ): stdClass|null {
        return $this->repositorio->create(
            $nome_pessoa,
            $duvida,
            $status,
            $detalhe
        ); 
    }

    // Deleta um registro
    public function delete(string $id)
    {
        $this->repositorio->delete($id); 
    }

    // Atualiza um registro
    public function update(
        string $id,
        string $nome_pessoa,
        string $duvida,
        string $status,
        string $detalhe,
        string $imagem
    ): stdClass|null {
        return $this->repositorio->update(
            $id,
            $nome_pessoa,
            $duvida,
            $status,
            $detalhe,
            $imagem
        ); 
    }

    public function new($nome_pessoa, $duvida, $status, $detalhe, $imagem)
    {
        // Lógica para criar uma nova pergunta
        $pergunta = new forum();
        $pergunta->nome_pessoa = $nome_pessoa;
        $pergunta->duvida = $duvida;
        $pergunta->status = $status;
        $pergunta->detalhe = $detalhe;
        $pergunta->imagem = $imagem;
        $pergunta->save();

        return $pergunta;
    }
}
