<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pergunta;
use Illuminate\Support\Facades\Validator;

class PerguntaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        return Pergunta::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        $validator = Validator::make($request->all(), [
            'pergunta_conteudo' => ['required','string', 'min:1'],
            'destinatario_id' => 'required',
        ]);

        if ($validator->fails()) {
             return redirect()->back()->withErrors(['pergunta_conteudo' =>'Digite algo...']);
        }

        $data = array();
        $data['pergunta_conteudo'] = $request->pergunta_conteudo;
        $data['destinatario_id'] = $request->destinatario_id; 
        $data['anonimo'] = true;               
        if(!$request->anonimo){
            $data['anonimo'] = false;
            $data['remetente_id'] = auth()->id();
        }

        Pergunta::create($data);

        return redirect()->back()->with('msg', 'Sua pergunta foi enviada!');
        
    }

    public function perguntasRecebidas(){
        
        $perguntas = Pergunta::getPerguntasRecebidas(auth()->id());

        return view('usuario.perguntas-recebidas',['perguntasRecebidas' => $perguntas]);    
        

    }


}
