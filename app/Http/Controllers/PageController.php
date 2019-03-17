<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Pergunta;
use App\Like;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function perfil(Request $request)
    {
        $usuario = $request->username;
        $usuario = User::where('username', 'LIKE',  $usuario)->first();

        if(count($usuario) > 0){
            $perguntas = Pergunta::getPerguntasRespostas($usuario->id);
            $qtdPerguntas = count($perguntas);

            foreach($perguntas as $pergunta){
                $pergunta->qtdLikes = count(Like::where('resposta_id', $pergunta->resposta_id)->get());
                $pergunta->userLiked = false;

                $retorno = count(Like::where('resposta_id', $pergunta->resposta_id)->where('usuario_like_id', auth()->id())->get());
                
                if($retorno){
                    $pergunta->userLiked = true;
                }
            }            

            return view('usuario.perfil',['usuario' => $usuario, 'perguntasRespondidas' => $perguntas, 'qtdPerguntasRespondidas' => $qtdPerguntas]);    
        }

        return redirect('/explorar');
    }

    public function explorar()
    {
        $usuarios = User::take(3)->orderBy('id', 'asc')->get();
        return view('explorar')->withSugestoes($usuarios);
    }
}
