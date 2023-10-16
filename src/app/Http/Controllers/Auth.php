<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as AuthFacade;

class Auth extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function post(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (AuthFacade::attempt($credentials)) {
            $token = AuthFacade::user()->createToken('token_name');
            return response()->json([
                'token' => $token->plainTextToken
            ]);
        }
        return response()->json(null, 401);
    }
}
