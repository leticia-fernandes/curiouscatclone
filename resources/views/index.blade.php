@extends('layouts.layout-no-nav')

@section('content')

<div class="container-fluid full-screen">
    <div class="middle-fullscreen text-center">
        <section class="mainpage">
            <div class="row">
                <div class="col">
                    <img src="{{ asset('img/logo-ccc.png') }}">
                    <h1>CuriousCatClone</h1>
                    <h2>Seja bem-vindo!</h2>
                </div>
            </div>
            <div class="mainlinks">
                <div class="row">
                    <div class="col-md-2 offset-md-4">
                        <a href="{{ route('login') }}">{{ __('Entrar') }}</a>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('register') }}">{{ __('Criar Conta') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection