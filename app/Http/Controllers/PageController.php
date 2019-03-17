<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Pergunta;

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

            return view('usuario.perfil',['usuario' => $usuario, 'perguntasRespondidas' => $perguntas, 'qtdPerguntasRespondidas' => $qtdPerguntas]);    
        }

        return redirect('/explorar');
    }

    public function explorar()
    {
        $usuarios = User::take(3)->orderBy('id', 'desc')->get();
        return view('explorar')->withSugestoes($usuarios);
    }
}
