<?php

namespace App\Http\Controllers;

use App\Http\Requests\validadeSupportRequest;
use Illuminate\Http\Request;
use App\Models\forum;
use App\Models\Resposta;


class controllerteste extends Controller
{
    public function visao()
    {
        return view('site');
    }
    public function forum()
    {
        return view('forum_de_duvidas', ['title'=>'Crie sua Duvida'], ['subtitle'=>'Crie sua duvida aqui!']);
    }
    public function envios(validadeSupportRequest $request)
  {
      $pergunta = new forum();


      $pergunta->nome_pessoa = $request->nome_pessoa;
      $pergunta->duvida = $request->duvida;
      $pergunta->detalhe = $request->detalhe;
      $pergunta->imagem = $request->imagem;
      $pergunta->save();

      return redirect()->route('index.site');


      }
      public function consulta()
  {
    $pergunta = forum::all();

    return view('envios', [
      'title' => 'Consulta de registros', 'subtitle'=>'Veja todas as duvidas por aqui.'], compact('pergunta'));
  }
  public function editar(int|string $id)
  {
      $pergunta = forum::find($id);
  
      if (!$pergunta) {
          return back()->with('error', 'Suporte não encontrado.');
      }
  
      return view('edição', compact('pergunta'));
  }
  public function atualizar(validadeSupportRequest $request, forum $pergunta, string $id)
{
    if (!$pergunta = $pergunta->find($id)) {
        return back()->with('error', 'Suporte não encontrado.');
    }

    if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
        $path = $request->file('imagem')->store('public/images');

        $pergunta->imagem = str_replace('public/', '', $path);
    }

    $pergunta->update($request->only(['nome_pessoa', 'duvida', 'detalhe', 'status', 'imagem']));

    return redirect()->route('index.envios')->with('success', 'pergunta '.$pergunta->id .' com sucesso!');

    
}
public function  deletar( int|string $id)
    {
        if (!$pergunta = forum::find($id)) {
            return back()->with('error', 'Suporte não encontrado.');
        }
        $pergunta->delete();

        return redirect()->route('index.envios')->with('success', 'pergunta '.$pergunta->id .' deletada com sucesso!');
    }
    public function responder(int $id)
{
    $pergunta = forum::find($id);

    if (!$pergunta) {
        return back()->with('error', 'Pergunta não encontrada.');
    }

    return view('responder_pergunta', compact('pergunta'));
}

public function salvarResposta(Request $request, $id)
{
    $request->validate([
        'conteudo' => 'required|min:3|max:1000',
    ]);

    $pergunta = forum::find($id);

    if (!$pergunta) {
        return back()->with('error', 'Pergunta não encontrada.');
    }

    Resposta::create([
        'forum_id' => $pergunta->id,
        'conteudo' => $request->conteudo,
    ]);

    return redirect()->route('index.envios')->with('success', 'Resposta adicionada com sucesso!');
}



}
