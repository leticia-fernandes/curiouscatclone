<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Resposta;

class Pergunta extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pergunta_conteudo', 'remetente_id', 'destinatario_id', 'anonimo', 'ativo'
    ];

    public static function getPerguntasRespostas ($id){
        return DB::table('perguntas')
            ->join('respostas', function($join) use (&$id) {
                $join->on('perguntas.id', '=', 'respostas.pergunta_id')
                     ->where('perguntas.destinatario_id',$id );
            })
            ->leftjoin('users', function($join) {
                $join->on('perguntas.remetente_id','=','users.id');
            })
            ->select('perguntas.*', 
                     'respostas.id as resposta_id',
                     'respostas.resposta_conteudo', 
                     'users.username as remetente_username')
            ->orderBy('perguntas.created_at', 'desc')
            ->get();
    }

    public static function getPerguntasRecebidas ($id){
        return DB::table('perguntas')        
            ->leftjoin('users', function($join) {
                $join->on('perguntas.remetente_id','=','users.id');
                
            })
            ->where('perguntas.destinatario_id', $id )
            ->whereNotIn('perguntas.id', Resposta::select('pergunta_id')->get())
            ->select('perguntas.*', 'users.username as remetente_username')
            ->get();
    }
}
