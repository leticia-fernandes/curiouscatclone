<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'resposta_conteudo', 'pergunta_id', 'ativo',
    ];
}
