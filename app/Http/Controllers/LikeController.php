<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use Illuminate\Support\Facades\Validator;

class LikeController extends Controller
{
    public function store(Request $request)
    {        
        $validator = Validator::make($request->all(), [
            'resposta_id' => 'required',
            'usuario_like_id' => 'required',
        ]);

        if ($validator->fails()) {
             return redirect()->back();
        }

        Like::create([
            'resposta_id' => $request->resposta_id,
            'usuario_like_id' => $request->usuario_like_id
        ]);

        return redirect()->back();        
    }
}
