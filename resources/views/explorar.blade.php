@extends('layouts.layout-nav')

@section('title', 'Explorar | CuriousCatClone')

@section('content')

    <div class="container">
        <section class="explorar">
            <div class="row">
                <div class="col">
                    <h1>Explorar</h1>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <form action="/explorar" method="POST" role="search">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" name="usuario_solicitado"
                                placeholder="Encontre usuários"> <span class="input-group-btn">
                        <button type="submit" class="btn btn-ccc-search">
                            <i class="fas fa-search"></i>
                        </button>
                    </span>
                        </div>
                    </form>
                </div>
            </div>
            <br>
            @if(isset($retorno))
                <div class="row">
                    <div class="col">
                        <p> Resultados encontrados para <b>' {{ $solicitacao }} '</b> </p>
                        <table class="table table-striped">
                            <tbody>
                            @foreach($retorno as $usuario)
                                <tr>
                                    <td>
                                        <a href="{{ route('perfil', $usuario->username)}}">
                                            <p><strong>{{$usuario->username}}</strong></p>
                                            <p class="text-muted">{{$usuario->name}}</p>
                                        </a>
                                    </td>                        
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @elseif(isset($sugestoes) && count($sugestoes) > 0)
                <div class="row">
                    <div class="col">
                        <p> Sugestões de Usuários </p>
                        <table class="table table-striped">
                            <tbody>
                            @foreach($sugestoes as $usuario)
                                <tr>
                                    <td>
                                        <a href="{{ route('perfil', $usuario->username)}}">
                                            <p><strong>{{$usuario->username}}</strong></p>
                                            <p class="text-muted">{{$usuario->name}}</p>
                                        </a>
                                    </td>                        
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            @if(isset($msg))
                <div class="row">
                    <div class="col">
                        <p class="text-muted">{{$msg}}</p>
                    </div>
                </div>
            @endif
        </section>
    </div>

@endsection