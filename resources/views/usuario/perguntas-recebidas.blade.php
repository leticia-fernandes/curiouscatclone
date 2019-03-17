@extends('layouts.layout-nav')

@section('title', "Perguntas Recebidas | CuriousCatClone")

@section('content')

    <div class="container">
        <section class="perguntas-recebidas">
            <h1>Perguntas Recebidas</h1> 
            @if (session('msg'))
            <div class="row">
                <div class="col">
                    <div class="alert alert-success">
                        <small class="text-success">
                            <strong>{{session('msg')}}</strong>
                        </small>
                    </div>
                </div>
            </div>
            @endif
            @if(isset($perguntasRecebidas) && count($perguntasRecebidas) > 0 )
                @foreach($perguntasRecebidas as $pergunta)
                    <div class="lista-perguntas-respostas"> 
                        <div class="row">
                            <div class="col">
                                <small class="text-muted">
                                    <em>Enviada por </em>
                                    @if($pergunta->remetente_username)
                                        <a href="{{ route('perfil', $pergunta->remetente_username)}}">
                                        {{$pergunta->remetente_username}}
                                        </a>  
                                    @else
                                    {{'anônimo'}}
                                    @endif
                                </small>
                                <h1>{{$pergunta->pergunta_conteudo}}</h1>
                                

                                <form action="/responder" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{$pergunta->id}}" name="pergunta_id"/> 
                                    <div class="form-group">
                                        <label for="resposta_conteudo" class="text-muted">Envie sua resposta</label>
                                        <textarea class="form-control" id="resposta_conteudo" rows="3" name="resposta_conteudo" class="form-control" required></textarea>                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10">
                                        @if ($errors->has('resposta_conteudo'))
                                            <small class="text-danger">
                                                <strong>{{ $errors->first('resposta_conteudo') }}</strong>
                                            </small>
                                        @endif                                        
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group text-right ">
                                                <button type="submit" class="btn btn-lg btn-ccc">Responder</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>                        
                    </div>
                @endforeach                
            @else
                <br><br>
                <div class="row">
                    <div class="col text-center">
                        <p class="text-muted">Nenhuma pergunta nova :(</p>
                    </div>
                </div>
            @endif

        </section>        
    </div>

@endsection
