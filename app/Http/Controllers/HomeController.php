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

            return redirect(route('perfil', $usuario->username));
        }

        return view('index');
    }
}
