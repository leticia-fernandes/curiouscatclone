<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function perfil()
    {
        $dadosUsuario = User::find(auth()->id());

        return view('usuario.perfil', compact('dadosUsuario'));
    }

    public function explorar()
    {
        return view('explorar');
    }
}
