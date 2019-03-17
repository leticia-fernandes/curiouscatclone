@extends('layouts.layout-nav')

@section('title', "Perfil | CuriousCatClone")

@section('content')

    <div class="container">
        <section class="perfil">

            <div class="row">
                <div class="col-sm-10">
                    <h1>{{$usuario->name}}</h1>
                    <h2>/{{$usuario->username}}</h2>
                </div>
                <div class="col-sm-2 text-center perguntas-respondidas">
                    <h3>Perguntas respondidas</h3>
                    <p>
                        @if(@isset($qtdPerguntasRespondidas))
                            {{$qtdPerguntasRespondidas}}
                        @else
                            {{'0'}}
                        @endif
                    </p>
                </div>
            </div>

            @if($usuario->id != auth()->id())
            <div class="row">
                    <div class="col">
                        <form action="/perguntar" method="POST">
                            @csrf
                            <input type="hidden" value="{{$usuario->id}}" name="destinatario_id"/> 
                            <div class="form-group">
                                <label for="pergunta_conteudo" class="text-muted">Envie uma pergunta</label>
                                <textarea class="form-control" id="pergunta_conteudo" rows="3" name="pergunta_conteudo" class="form-control" required></textarea>
                                <div class="form-group form-check">
                                    <input class="form-check-input" type="checkbox" value="true" id="anonimo" name="anonimo">
                                    <label class="form-check-label " for="anonima">
                                          Enviar anonimamente
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                @if ($errors->has('pergunta_conteudo'))
                                    <small class="text-danger">
                                        <strong>{{ $errors->first('pergunta_conteudo') }}</strong>
                                    </small>
                                @endif
                                @if (session('msg'))
                                    <small class="text-success">
                                        <strong>{{session('msg')}}</strong>
                                    </small>
                                @endif
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group text-right ">
                                        <button type="submit" class="btn btn-lg btn-ccc">Enviar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endif

            @if(isset($perguntasRespondidas) && count($perguntasRespondidas) > 0 )
                @foreach($perguntasRespondidas as $pergunta)
                    <div class="lista-perguntas-respostas">  
                        @if($pergunta->userLiked === false && $usuario->id != auth()->id())
                            <div class="row">
                                <div class="col text-right">                                    
                                    <form action="/like" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{$pergunta->resposta_id}}" name="resposta_id"/> 
                                        <input type="hidden" value="{{auth()->id()}}" name="usuario_like_id"/> 
                                        <small class="text-muted">{{$pergunta->qtdLikes ? $pergunta->qtdLikes : '0'}} likes</small>
                                        <button type="submit" class="btn-like"><i class="far fa-heart"></i></button>                                        
                                    </form>
                                </div>
                            </div>
                        @endif
                        @if($pergunta->userLiked === true || $usuario->id == auth()->id())
                            <div class="row">
                                <div class="col text-right">                                     
                                        <small class="text-muted">{{$pergunta->qtdLikes ? $pergunta->qtdLikes : '0'}} likes</small>
                                        <button type="button" class="btn-like" disabled><i class="fas fa-heart"></i></button>
                                    </form>
                                </div>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col">
                                <h1>{{$pergunta->pergunta_conteudo}}</h1>
                                <h2>{{$pergunta->resposta_conteudo}}</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-right">
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
                            </div>
                        </div>                        
                    </div>
                @endforeach
            @else
                <br><br>
                <div class="row">
                    <div class="col text-center">
                        <p class="text-muted"><strong>{{ $usuario->id != auth()->id() ? $usuario->username : 'Você' }}</strong> ainda não respondeu nenhuma pergunta.</p>
                    </div>
                </div>
            @endif

        </section>        
    </div>

@endsection
