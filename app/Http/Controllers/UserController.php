<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function encontrarUsuarios(Request $request)
    {
        $usuario_solicitado = request('usuario_solicitado');
        $usuarios = User::where('name', 'LIKE', '%' . $usuario_solicitado . '%')->orWhere('username', 'LIKE', '%' . $usuario_solicitado . '%')->get();

        if (count ($usuarios) > 0) {
            return view('explorar')->withRetorno($usuarios)->withSolicitacao($usuario_solicitado);
        }else {
            return view('explorar')->withMsg('Nenhum usuário encontrado. Tente novamente!');
        }
    }
}
