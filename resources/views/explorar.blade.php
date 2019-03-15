@extends('layouts.layout-nav')

@section('title', 'Explorar | CuriousCatClone')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Explorar</h1>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <form action="/explorar" method="POST" role="search">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" name="usuario_solicitado"
                               placeholder="Encontre usuários"> <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                    </button>
                </span>
                    </div>
                </form>
            </div>
        </div>

        @if(isset($retorno))
            <p> Resultados encontrados para <b>' {{ $solicitacao }} '</b> </p>
            <h2>Sample User details</h2>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>
                @foreach($retorno as $usuario)
                    <tr>
                        <td>{{$usuario->name}}</td>
                        <td>{{$usuario->email}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif

        @if(isset($msg))
            <p class="text-warning">{{$msg}}</p>
        @endif


@endsection