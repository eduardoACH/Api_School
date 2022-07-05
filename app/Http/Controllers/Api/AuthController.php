<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LoginResource;
use App\Http\Requests\LoginRequest ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if(Auth::attempt($credentials)){
            //$request->session()->regenerate();
            Session::regenerate($request);
            Auth::user()->acceess_token = Auth::user()->createToken('authToken')->accessToken;
            return new LoginResource(Auth::user());
        }
        return response(['message' => 'Invalid Credentials'],400);
    }
}
 