<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resposta;
use Illuminate\Support\Facades\Validator;

class RespostaController extends Controller
{
    public function store(Request $request)
    {        
        $validator = Validator::make($request->all(), [
            'resposta_conteudo' => ['required','string', 'min:1'],
            'pergunta_id' => 'required',
        ]);

        if ($validator->fails()) {
             return redirect()->back()->withErrors(['resposta_conteudo' =>'Digite sua resposta...']);
        }

        Resposta::create([
            'resposta_conteudo' => $request->resposta_conteudo,
            'pergunta_id' => $request->pergunta_id
        ]);

        return redirect()->back()->with('msg', 'Resposta salva com sucesso!');        
    }
}
