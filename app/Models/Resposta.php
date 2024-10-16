<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Resposta extends Model
{
    protected $fillable = ['forum_id', 'conteudo'];

    public function forum()
    {
        return $this->belongsTo(Forum::class);
    }
}
