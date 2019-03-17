<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'resposta_id', 'usuario_like_id', 'ativo',
    ];
}
