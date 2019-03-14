<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if(auth()->check()){
            $usuario = User::find(auth()->id());

            return view('usuario.perfil', compact('usuario'));
        }

        return view('index');
    }
}
