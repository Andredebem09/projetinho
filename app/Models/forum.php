<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class forum extends Model
{
    use HasFactory;

    protected $table = 'forums';
   
    protected $fillable = ['nome_pessoa', 'duvida', 'detalhe', 'status', 'imagem'];

    public function respostas()
        {
            return $this->hasMany(Resposta::class);
        }
}